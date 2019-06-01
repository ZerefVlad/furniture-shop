<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\ImageModel;
use App\Models\MainPage;
use App\Models\Post;
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
        if (!$this->main) {
            $main = new MainPage();
            $main->block1 = json_encode([]);
            $main->block2 = json_encode([]);
            $main->block3 = json_encode([]);
            $main->save();
            $this->main = $main;
        }
    }



    public function index (Request $request)
    {
        $categories = $this->category_service->getCategories();
        $user_ip = $request->ip();

        $block1 = json_decode($this->main->block1);
        $textSlides = isset($block1->textSlides) ? $block1->textSlides : null;
        $videoSlides = isset($block1->videoSlides) ? $block1->videoSlides : null;
        $pictureSlides = isset($block1->pictureSlides) ? $block1->pictureSlides : null;


        $block2 = json_decode($this->main->block2);

        $block3 = json_decode($this->main->block3);
        $products = Product::skip(0)->latest('created_at')->take(4)->get();
        $posts = Post::skip(0)->latest('created_at')->take(3)->get();

        return view('main')
            ->with('categories', $categories)
            ->with('user_ip', $user_ip)
            ->with('textSlides', $textSlides)
            ->with('videoSlides', $videoSlides)
            ->with('pictureSlides', $pictureSlides)
            ->with('block2', $block2)
            ->with('block3', $block3)
            ->with('products', $products)
            ->with('posts', $posts)
            ;
    }






}


