<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.product_list', [
            'products' => $this->productService->getProducts()
        ]);
    }

    public function editProduct(int $id)
    {
        $product = Product::find($id);
        return view('admin.product.product_create', [
            'product' => $product
        ]);
    }

    public function editProductAction(int $id, Request $request)
    {
        $data = array_merge(
            $request->all(),
            [
                'active' => isset($request->active) ? true : false
            ]
        );

        foreach ($request->pictures as $key => $picture) {
            $filename = $picture->storeAs('products/'.$request->code, $request->img_title[$key].'.png');
        }
        $this->productService->updateProduct($id, $data);

        Session::flash('update', 'Successfully update');
        return back();
    }
}
