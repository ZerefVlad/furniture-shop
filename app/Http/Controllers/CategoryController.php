<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Filter;
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

    public function showProducts(Category $category, Request $request)
    {

        $filters = $category->filters;
        $data = [];
        foreach ($filters as $filter) {
            if ($filter->type === 'equal') {
                $data[$filter->id] = [];
                foreach ($category->products as $product) {
                    $value = $product->productAttributes()->where('attributes.id', $filter->attribute->id)->distinct()->first(['value']);
                    if ($value) {
                        $data[$filter->id][] = $value->value;
                    }
                }
                $data[$filter->id] = array_unique($data[$filter->id]);
            }
        }

        $products = $category->products()->paginate(16);
        if ($request->has('filter')) {
            $productIds = [];
            foreach ($category->products as $product) {
                $check = $product->applyFilters($request->get('filter'));
                if ($check) {
                    $productIds[] = $product->id;
                }
            }
            $products = $category->products()->whereIn('product_id', $productIds)->paginate(16);

        }

        return view('default.category')
            ->with('products', $products)
            ->with('category', $category)
            ->with('filters', $filters)
            ->with('filtersData', $data)
            ->with('filter', $request->get('filter'));
    }

    public function getCategories(string $type, Request $request)
    {
        $id = $request->get('categoryId');
        return response()->json(
            [
                'categories' => Category::where('type', $type)->get(),
                'selected' => Category::find($id) ? Category::find($id)->parent : null
            ]);
    }
}
