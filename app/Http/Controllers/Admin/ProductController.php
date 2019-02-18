<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
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

    public function createProduct(){

    }

    public function createCategory(Request $request)
    {
        $this->productService->createProduct($request->all());
        Session::flash('Product_create_success', 'Product успешно создана');

        return back();
    }

    public function editProduct(int $id)
    {
        /**
         * @var Product $product
         */
        $product = Product::find($id);
        $images = $product->getImages();
        $productAttributes = $product->attributes;
        $relatedProducts = $product->getRelatedProducts();

        return view('admin.product.product_create', [
            'product' => $product,
            'images' => $images,
            'relatedProducts' => $relatedProducts,
            'productAttributes' => $productAttributes,
            'categories' => $this->categoryService->getCategories(),
            'attributes' => $this->attributeService->getAttributes(),
        ]);
    }

    public function getProductsForRelated(Request $request)
    {
        return response()->json($this->productService->getRelatedProducts($request->get('product_id')));
    }

    public function editProductAction(int $id, Request $request)
    {

        $product = $this->productService->getProduct($id);

        $data = array_merge(
            $request->all(),
            [
                'active' => isset($request->active) ? true : false
            ]
        );
        if ($request->has('pictures')) {
            foreach ($request->pictures as $key => $picture) {
                /**
                 * @var UploadedFile $picture
                 */
                $picture->storeAs('products/' . $request->code, $request->img_title[$key] . '.png');


                $this->productService->addImage(
                    $product,
                    [
                        'title' => $request->img_title[$key],
                        'alt' => $request->img_alt[$key],
                        'code' => $request->code,
                    ]
                );
            }
        }

        $dataAttributes = [];
        if ($request->attrs) {
            foreach ($request->attrs as $key => $attrId) {
                $dataAttributes[] = [
                    'id' => $attrId,
                    'value' => $request->attrs_values[$key]
                ];
            }
            $this->productService->addOrUpdateAttributes($product, $dataAttributes);
        }

        $dataRelatedProducts = [];
        if ($request->relatedProd) {
            foreach ($request->relatedProd as $key => $relateProdId) {
                if ($request->relatedProdDiscount[$key] && $request->relatedProdQuantity[$key]) {
                    $dataRelatedProducts[] = [
                        'related_product_id' => $relateProdId,
                        'discount' => $request->relatedProdDiscount[$key],
                        'quantity' => $request->relatedProdQuantity[$key],
                    ];
                }
            }
            $this->productService->addOrUpdateRelatedProduct($product, $dataRelatedProducts);
        }

        if ($request->get('categories')) {
            $this->productService->addCategories($product, $request->get('categories'));
        }

        $this->productService->updateProduct($id, $data);

        $this->productService->addOrUpdateDiscount($product, $request->get('discount_value') ?? 0);

        Session::flash('update', 'Successfully update');
        return back();
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

}
