<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    protected $product_service;
    protected $category_service;

    public function __construct(ProductService $product_service, CategoryService $category_service)
    {
        $this->product_service = $product_service;
        $this->category_service = $category_service;
    }

    public function showProducts (Category $category)
    {
       $products = $category->products()->paginate(16);




        return view('default.category')
            ->with('products', $products)
            ->with('category', $category);
    }
}
