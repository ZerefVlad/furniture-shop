<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGaleryRequest;
use App\Models\Image;
use App\Models\ImageModel;
use App\Services\GaleryService;
use App\Models\Galery;
use App\Http\Requests\GaleryCreateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    protected $galery_service;

    public function __construct(GaleryService $galery_service)
    {
        $this->galery_service = $galery_service;
        $this->middleware('auth');
    }

    public function index ()
    {
        $galeries = $this->galery_service->getGaleries();

        return view('admin.galery.galery_list')
            ->with('galeries', $galeries);
    }

    public function createGalery(Request $request)
    {
        $request->file('image')->storeAs('galeries/'.$request->title,$request->image_title.'.png');
        $this->galery_service->createGalery(

            $request->except('filters')
        );

        Session::flash('galery_create_success', 'Элемент галереи успешно создан');

        return back();
    }

    public function  GaleryActionCreate(Request $request)
    {
        $galeries = $this->galery_service->getGaleries();

        return view('admin.galery.galery_create')
            ->with('action', 'create')
            ->with('galery', null)
            ->with('image', null)
            ->with('galeries', $galeries);
    }

    public function editGalery(Galery $galery, Request $request)
    {
        if ($image = $request->has('image')) {
            $request->file('image')->storeAs('galeries/'.$request->title, $request->image_title.'.png');
        }


        $this->galery_service->editGalery(
            $galery,
            $request->except('filters')
        );
        Session::flash('galery_edit_success', 'Galery success changed');

        return redirect()->route('galery_action_edit', ['galery' => $galery]);
    }

    public function  galeryActionEdit(Galery $galery, Request $request)
    {
        $galeries = $this->galery_service->getGaleries();

        $image = $galery->getImage();

        return view('admin.galery.galery_create')
            ->with('action', 'edit')
            ->with('image', $image)
            ->with('galery', $galery)
            ->with('galeries', $galeries);
    }



    public function deleteGalery(Galery $galery)
    {
        $galery->delete();
        Session::flash('galery_delete_success', 'galery success deleted');

        return back();
    }

    public function deletePicture(Galery $galery)
    {
        $galery->deleteImage();
        return back();
    }
}
