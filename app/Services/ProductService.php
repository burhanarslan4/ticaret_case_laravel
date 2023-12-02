<?php

namespace App\Services;

use App\Repositories\ProductRepository;
use App\Models\Order;
use App\Services\OrderService;

class ProductService
{
    protected $productRepository;
    protected $orderService;

    public function __construct(ProductRepository $productRepository, OrderService $orderService)
    {
        $this->productRepository = $productRepository;
        $this->orderService = $orderService;
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAllProducts();
    }

    public function getProductById($productId)
    {
        return $this->productRepository->getProductById($productId);
    }

    public function createProduct($data)
    {
        return $this->productRepository->createProduct($data);
    }

    public function updateProduct($productId, $data)
    {
      
        return $this->productRepository->updateProduct($productId, $data);
    }

    public function deleteProduct($productId)
    {
        return $this->productRepository->deleteProduct($productId);
    }

    public function createOrder(Product $product)
    {
        // Kullanıcının bir siparişi var mı kontrol et
        $order = auth()->user()->orders()->where('status', 'cart')->first();

        if (!$order) {
            // Kullanıcının mevcut bir sepeti yoksa, yeni bir sipariş oluştur
            $order = Order::create([
                'user_id' => auth()->user()->id,
                'status' => 'cart',
            ]);
        }

        // Siparişe ürünü ekle
        $order->products()->attach($product->id);

        // Siparişi döndür
        return $order;
    }
}
