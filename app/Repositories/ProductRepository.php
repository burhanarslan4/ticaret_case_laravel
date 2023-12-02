<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Contracts\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function getProductById($productId)
    {
        return Product::find($productId);
    }

    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function updateProduct($productId, $data)
    {
        
        $product = Product::find($productId);
        
        if ($product) {
            $product->update($data);
            return $product;
        } else {
            \Log::error("Ürün bulunamadı: ProductID=$productId");
            return null;
        }
    }

    public function deleteProduct($productId)
    {
        Product::destroy($productId);
    }
}
