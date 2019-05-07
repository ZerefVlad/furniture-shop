<?php

namespace App\Http\Controllers\Admin;

use App\Models\MainPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class MainPageController extends Controller
{
    //
    public function show()
    {
        return view('admin.main_page.main_page_create', [
            'images' => null,
            'main_page' => MainPage::all(),
        ]);
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

       dd($request->all());

       return redirect()->route('main_page_create');
    }

    public function addImage(MainPage $main_page, array $imageData): void
    {
        $imageData = array_merge($imageData, [
            'url' => Storage::url('main_page/'.$imageData['code'].'/'.$imageData['title'].'.png')
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
