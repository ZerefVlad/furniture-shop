<?php

namespace App\Services;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Support\Collection;

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

    public function createProduct(array $data): void
    {
        Product::create($data);
    }

    public function updateProduct(int $id, array $data)
    {
        $product = Product::find($id);
        $product->update($data);
    }

    public function deleteProduct(int $id): void
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function addImage(int $productId)
    {
        $product = Product::find($productId);
    }
}