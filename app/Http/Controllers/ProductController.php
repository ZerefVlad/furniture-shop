<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showSingeProduct(Category $category, Product $product)
    {
        return view('default.single_product', [
            'product' => $product,
            'category' => $category
        ]);
    }
}
