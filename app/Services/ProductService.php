<?php

namespace App\Services;

use App\Models\Discount;
use App\Models\Image;
use App\Models\ImageModel;
use App\Models\Product;
use App\Models\Product_discount;
use Illuminate\Support\Collection;
use App\Models\ProductAttribute;
use App\Models\RelatedProduct;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getProduct(int $id): Product
    {
        return Product::find($id);
    }

    public function getProducts(): Collection
    {
        return Product::all();
    }

    public function getRelatedProducts(int $productId): Collection
    {
        return Product::where('id', '!=', $productId)->get();
    }

    public function createProduct(array $data): Product
    {
        $product = Product::create($data);

        return $product;
    }

    public function updateProduct(Product $product, array $data)
    {
        $product->update($data);
    }

    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }

    public function addCategories(Product $product, array $categories): void
    {
        $product->categories()->detach();
        $product->categories()->attach($categories);
    }

    public function addOrUpdateAttributes(Product $product, array $attributes): void
    {
        foreach ($attributes as $attribute) {
            $relation = ProductAttribute::where('product_id', $product->id)
                ->where('attribute_id', $attribute['id'])->first();
            if ($relation) {
                $relation->update([
                    'value' => $attribute['value'],
                ]);
            } else {
                ProductAttribute::create([
                    'attribute_id' => $attribute['id'],
                    'value' => $attribute['value'],
                    'product_id' => $product->id,
                ]);
            }
        }
    }

    public function addOrUpdateDiscount(Product $product, int $value): void
    {
        $discount = Discount::where('product_id', $product->id)->first();
        if ($discount) {
            $discount->update([
                'value' => $value,
            ]);
        } else {
            $discount = new Discount();
            $discount->product_id = $product->id;
            $discount->value = $value;
            $discount->save();
            $discount->product()->associate($product);
        }
    }

    public function deleteDiscount(Product $product, int $discount_id): void
    {
        Product_discount::where('product_id', $product->id)
            ->where('discount_id', $discount_id)
            ->delete();
    }

    public function deleteAttribute(Product $product, int $attribute_id): void
    {
        ProductAttribute::where('product_id', $product->id)
            ->where('attribute_id', $attribute_id)
            ->delete();
    }

    public function addOrUpdateRelatedProduct(Product $product, array $related_products): void
    {
        foreach ($related_products as $related_product) {
            $relation = RelatedProduct::where('main_product_id', $product->id)
                ->where('related_product_id', $related_product['related_product_id'])->first();
            if ($relation) {
                $relation->update([
                    'discount' => $related_product['discount'],
                    'quantity' => $related_product['quantity'],
                ]);
            } else {
                RelatedProduct::create([
                    'discount' => $related_product['discount'],
                    'quantity' => $related_product['quantity'],
                    'main_product_id' => $product->id,
                    'related_product_id' => $related_product['related_product_id']
                ]);
            }
        }
    }

    public function addImage(Product $product, array $imageData): void
    {
        $imageData = array_merge($imageData, [
            'url' => Storage::url('products/'.$imageData['code'].'/'.$imageData['title'].'.png')
        ]);
        $product->addImage($imageData);
    }

    public function updateImage(Product $product, array $imageData): void
    {
        $product->updateImage($imageData);
    }

    public function deleteImage(Product $product, int $imageId)
    {
        $product->deleteImage($imageId);
    }
}