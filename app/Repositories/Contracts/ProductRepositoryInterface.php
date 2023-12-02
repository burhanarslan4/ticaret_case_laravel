<?php

namespace App\Repositories\Contracts;

interface ProductRepositoryInterface
{
    public function getAllProducts();

    public function getProductById($productId);

    public function createProduct($data);

    public function updateProduct($productId, $data);

    public function deleteProduct($productId);
}
