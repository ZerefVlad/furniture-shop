<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class MainPageController extends Controller
{
    protected $main;

    public function __construct()
    {
        $this->main = MainPage::first();
    }

    public function show()
    {
        return view('admin.main_page.main_page_create', [
            'images' => null,
            'main_page' => MainPage::all(),
        ]);
    }

    public function AddFirstBlock(Request $request)
    {
        $textSlides = [];
        foreach ($request->get('title') as $key => $title) {
            $textSlides[$key]['title'] = $title;
        }
        foreach ($request->get('description') as $key => $description) {
            $textSlides[$key]['description'] = $description;
        }
        foreach ($request->get('url') as $key => $url) {
            $textSlides[$key]['url'] = $url;
        }
        /**
         * @var  $key
         * @var UploadedFile $image
         */
        foreach ($request->file('image') as $key => $image) {
            $image->storeAs('/main-page/block-1', $image->getFilename() . '.jpg');
            $textSlides[$key]['image'] = Storage::url('/main-page/block-1/' . $image->getFilename() . '.jpg');
        }


        foreach ($request->get('url_picture') as $key => $url_picture) {
            $pictureSlides[$key]['url_picture'] = $url_picture;
        }
        foreach ($request->file('picture') as $key => $picture) {
            $picture->storeAs('/main-page/block-1/picture/', $picture->getFilename() . '.jpg');
            $pictureSlides[$key]['picture'] = Storage::url('/main-page/block-1/picture/' . $picture->getFilename() . '.jpg');
        }


        $this->main->block1 = json_encode([
            'textSlides' => $textSlides,
            'videoSlides' => $request->get('video') ?? [],
            'pictureSlides' => $pictureSlides,
        ]);
        $this->main->save();
        return back();
    }

    public function AddSecondBlock(Request $request)
    {
        $request->file('image')->storeAs('/main-page/block-2', $request->file('image')->getFilename().'jpg');
        $request->file('image2')->storeAs('/main-page/block-2', $request->file('image2')->getFilename().'jpg');
        $this->main->block2 = json_encode(array_merge($request->except(['image', 'image2']), [
            'image' => Storage::url('/main-page/block-2/'.$request->file('image')->getFilename().'jpg'),
            'image2' => Storage::url('/main-page/block-2/'.$request->file('image2')->getFilename().'jpg'),
        ]));
        $this->main->save();
        return back();
    }

    public function AddThirdBlock(Request $request)
    {

        $this->main->block3 = json_encode($request->all());
        $this->main->save();
        return back();
    }


    public function addPictureSlider(Request $request)
    {
        $data = array_merge(
            $request->all(),
            [
                'active' => isset($request->active) ? true : false
            ]
        );


        if ($request->has('pictures')) {
            foreach ($request->pictures as $key => $picture) {
                $main_page = new MainPage;

                if ($request->get('code') && $request->get('img_alt') && $request->get('img_title')) {
                    /**
                     * @var UploadedFile $picture
                     */
                    $picture->storeAs('main_page/' . $request->get('code'), $request->get('img_title')[$key] . '.png');

                    $this->addImage(
                        $main_page,
                        [
                            'title' => $request->get('img_title')[$key],
                            'alt' => $request->get('img_alt')[$key],
                            'url_tovara' => $request->get('url_tovara'),
                        ]
                    );
                }
            }
        }

        //dd($request->all());

        return redirect()->route('main_page_create');
    }

    public function addImage(MainPage $main_page, array $imageData): void
    {
        $imageData = array_merge($imageData, [
            'url' => Storage::url('main_page/' . $imageData['code'] . '/' . $imageData['title'] . '.png')
        ]);
        $main_page->addImage($imageData);
    }

    public function updateImage(MainPage $main_page, array $imageData): void
    {
        $main_page->updateImage($imageData);
    }

    public function deleteImage(MainPage $main_page, int $imageId)
    {
        $main_page->deleteImage($imageId);
    }
}
