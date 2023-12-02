<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function createOrder($userId, $productId)
    {
        // Kullanıcının bir siparişi var mı kontrol et
        $order = Order::where('user_id', $userId)->where('status', 'cart')->first();

        if (!$order) {
            // Kullanıcının mevcut bir sepeti yoksa, yeni bir sipariş oluştur
            $order = Order::create([
                'user_id' => $userId,
                'status' => 'cart',
            ]);
        }

        // Siparişe ürünü ekle
        $order->products()->attach($productId);

        // Siparişi döndür
        return $order;
    }
}
