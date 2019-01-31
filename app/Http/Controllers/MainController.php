<?php

namespace App\Http\Controllers;


use App\Models\Image;
use App\Models\ImageModel;
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

    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
        $this->middleware('auth');
    }

    public function index ()
    {
        $categories = $this->category_service->getCategories();

        return view('main')
            ->with('categories', $categories);
    }
}
