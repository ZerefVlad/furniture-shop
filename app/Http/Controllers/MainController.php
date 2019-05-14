<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\ImageModel;
use App\Models\MainPage;
use App\Models\Product;
use App\Services\CategoryService;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryCreateRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
    protected $category_service;
    protected $main;

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
        $this->main = MainPage::first();
    }



    public function index (Request $request)
    {
        $categories = $this->category_service->getCategories();
        $user_ip = $request->ip();

        $block1 = json_decode($this->main->block1);
        $textSlides = $block1->textSlides;
        $videoSlides = $block1->videoSlides;

        $block2 = json_decode($this->main->block2);

        $block3 = json_decode($this->main->block3);
        //Product::skip(0)->take(3)->get();

        return view('main')
            ->with('categories', $categories)
            ->with('user_ip', $user_ip)
            ->with('textSlides', $textSlides)
            ->with('videoSlides', $videoSlides)
            ->with('block2', $block2)
            ->with('block3', $block3)
            ;
    }






}


