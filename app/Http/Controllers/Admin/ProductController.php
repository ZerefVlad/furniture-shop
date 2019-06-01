<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductColor;
use App\Services\AttributeService;
use App\Services\CategoryService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * @var ProductService
     */
    protected $productService;

    /**
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * @var AttributeService
     */
    protected $attributeService;


    public function __construct(ProductService $productService, CategoryService $categoryService, AttributeService $attributeService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->attributeService = $attributeService;
    }

    public function index()
    {
        return view('admin.product.product_list', [
            'products' => $this->productService->getProducts()
        ]);
    }

    public function createProduct()
    {
        return view('admin.product.product_create', [
            'product' => null,
            'images' => null,
            'videos' => null,
            'relatedProducts' => null,
            'productAttributes' => null,
            'categories' => $this->categoryService->getCategories(),
            'attributes' => $this->attributeService->getAttributes(),
            'colors' => ProductColor::all(),
            'selectedColorIds', [],
        ]);
    }

    public function createProductAction(Request $request)
    {
        $data = array_merge(
            $request->except(['colors', 'price', 'videos', 'categories', 'discount_value', 'img_alt', 'img_title', 'attrs', 'attrs_values', 'pictures', 'relatedProd', 'relatedProdDiscount', 'relatedProdQuantity']),
            [
                'active' => isset($request->active) ? true : false,
                'video_id' => json_encode($request->get('videos'))
            ]
        );
        $product = $this->productService->createProduct($data);
        if ($request->has('colors')) {
            $product->colors()->detach();

            foreach ($request->colors as $color) {

                $product->colors()->attach(ProductColor::find($color));
            }
        }
        if ($request->has('pictures')) {
            foreach ($request->pictures as $key => $picture) {
                if ($request->get('code') && $request->get('img_alt') && $request->get('img_title')) {
                    /**
                     * @var UploadedFile $picture
                     */
                    $picture->storeAs('products/' . $request->get('code'), $request->get('img_title')[$key] . '.png');

                    $this->productService->addImage(
                        $product,
                        [
                            'title' => $request->get('img_title')[$key],
                            'alt' => $request->get('img_alt')[$key],
                            'code' => $request->get('code'),
                        ]
                    );
                }
            }
        }


        $dataAttributes = [];
        if ($request->get('attrs')) {
            if ($request->get('attrs_values')) {
                foreach ($request->attrs as $key => $attrId) {
                    $dataAttributes[] = [
                        'id' => $attrId,
                        'value' => $request->attrs_values[$key]
                    ];
                }
                $this->productService->addOrUpdateAttributes($product, $dataAttributes);
            }
        }

        if ($request->has('price')) {
            $this->productService->addOrUpdateAttributes($product, [
                [
                    'id' => 1,
                    'value' => $request->get('price') ?? 0,
                ]
            ]);
        }

        $dataRelatedProducts = [];
        if ($request->get('relatedProd')) {
            foreach ($request->get('relatedProd') as $key => $relateProdId) {
                if ($request->get('relatedProdDiscount')[$key] && $request->get('relatedProdQuantity')[$key]) {
                    $dataRelatedProducts[] = [
                        'related_product_id' => $relateProdId,
                        'discount' => $request->get('relatedProdDiscount')[$key],
                        'quantity' => $request->get('relatedProdQuantity')[$key],
                    ];
                }
            }
            $this->productService->addOrUpdateRelatedProduct($product, $dataRelatedProducts);
        }

        if ($request->get('categories')) {
            $this->productService->addCategories($product, $request->get('categories'));
        }
        $this->productService->addOrUpdateDiscount($product, $request->get('discount_value') ?? 0);

        Session::flash('update', 'Product created successfully');
        return redirect()->route('product_edit', ['product' => $product]);
    }

    public function editProduct(Product $product)
    {
        $selectedColors = $product->colors;
        $selectedColorIds = [];
        foreach ($selectedColors as $color) {
            $selectedColorIds[] = $color->id;
        }

        $images = $product->getImages();
        $productAttributes = $product->getProductAttributes();
        $relatedProducts = $product->getRelatedProducts();
        $videos = json_decode($product->video_id);
        return view('admin.product.product_create', [
            'product' => $product,
            'images' => $images,
            'videos' => $videos,
            'relatedProducts' => $relatedProducts,
            'productAttributes' => $productAttributes,
            'categories' => $this->categoryService->getCategories(),
            'attributes' => $this->attributeService->getAttributes(),
            'colors' => ProductColor::all(),
            'selectedColorIds', $selectedColorIds,
        ]);
    }

    public function getProductsForRelated(Request $request)
    {
        return response()->json($this->productService->getRelatedProducts($request->get('product_id')));
    }

    public function editProductAction(Product $product, Request $request)
    {
        $data = array_merge(
            $request->except(['colors','price', 'videos', 'categories', 'discount_value', 'img_alt', 'img_title', 'attrs', 'attrs_values', 'pictures', 'relatedProd', 'relatedProdDiscount', 'relatedProdQuantity']),

            [
                'active' => isset($request->active) ? true : false,
                'video_id' => json_encode($request->get('videos'))
            ]
        );

        if ($request->has('colors')) {
            $product->colors()->detach();
            foreach ($request->colors as $color) {

                $product->colors()->attach(ProductColor::find($color));
            }
        }

        if ($request->has('pictures')) {
            foreach ($request->pictures as $key => $picture) {
                if ($request->get('code') && $request->get('img_alt') && $request->get('img_title')) {
                    /**
                     * @var UploadedFile $picture
                     */
                    $picture->storeAs('products/' . $request->get('code'), $request->get('img_title')[$key] . '.png');

                    $this->productService->addImage(
                        $product,
                        [
                            'title' => $request->get('img_title')[$key],
                            'alt' => $request->get('img_alt')[$key],
                            'code' => $request->get('code'),
                        ]
                    );
                }
            }
        }

        $dataAttributes = [];
        if ($request->get('attrs')) {
            foreach ($request->attrs as $key => $attrId) {
                if ($request->get('attrs_values')[$key]) {
                    $dataAttributes[] = [
                        'id' => $attrId,
                        'value' => $request->get('attrs_values')[$key]
                    ];
                }
            }
            $this->productService->addOrUpdateAttributes($product, $dataAttributes);
        }
        if ($request->has('price')) {
            $this->productService->addOrUpdateAttributes($product, [
                [
                    'id' => 1,
                    'value' => $request->get('price') ?? 0,
                ]
            ]);
        }
        $dataRelatedProducts = [];
        if ($request->get('relatedProd')) {
            foreach ($request->get('relatedProd') as $key => $relateProdId) {
                if ($request->get('relatedProdDiscount')[$key] && $request->get('relatedProdQuantity')[$key]) {
                    $dataRelatedProducts[] = [
                        'related_product_id' => $relateProdId,
                        'discount' => $request->get('relatedProdDiscount')[$key],
                        'quantity' => $request->get('relatedProdQuantity')[$key],
                    ];
                }
            }
            $this->productService->addOrUpdateRelatedProduct($product, $dataRelatedProducts);
        }

        if ($request->get('categories')) {
            $this->productService->addCategories($product, $request->get('categories'));
        }

        $this->productService->updateProduct($product, $data);

        $this->productService->addOrUpdateDiscount($product, $request->get('discount_value') ?? 0);

        Session::flash('update', 'Successfully update');
        return redirect()->route('product_edit', ['product' => $product]);
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('product_list');
    }

    public function updateImageData(Request $request)
    {
        $product = $this->productService->getProduct($request->get('product_id'));
        $product->updateImage($request->only([
            'id',
            'code',
            'title',
            'alt'
        ]));
    }

    public function deleteImageData(Request $request)
    {
        $product = $this->productService->getProduct($request->get('product_id'));
        $product->deleteImage($request->id);
    }

    public function updateAttributeData(Request $request)
    {
        $product = $this->productService->getProduct($request->get('product_id'));
        $product->updateAttribute($request->only([
            'id',
            'value'
        ]));
    }

    public function deleteAttributeData(Request $request)
    {
        $product = $this->productService->getProduct($request->get('product_id'));
        $product->deleteAttribute($request->id);
    }

    public function updateRelateProductData(Request $request)
    {
        $product = $this->productService->getProduct($request->get('main_product_id'));
        $product->updateRelateProduct($request->only([
            'main_product_id',
            'quantity',
            'discount',
            'related_product_id',
        ]));
    }

    public function deleteRelateProductData(Request $request)
    {
        $product = $this->productService->getProduct($request->get('main_product_id'));
        $product->deleteRelateProduct($request->all());
    }

    public function search(Request $request)
    {
        $products = Product::search($request->get('product'))->get();
        return view('admin.product.product_list', [
            'products' => $products,
        ]);
    }

}
