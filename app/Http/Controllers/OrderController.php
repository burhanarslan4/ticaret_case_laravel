<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Repositories\InvoiceRepository;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    protected $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    public function createOrder(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        $order = new Order();
        $order->product_id = $product->id;
        $order->total_price = $product->price; 
        $order->save();

        return response()->json(['message' => 'Sipariş oluşturuldu.', 'order_id' => $order->id], 200);
    }

    public function makePayment(Request $request)
{
    $orderId = $request->input('order_id');
    $order = Order::find($orderId);

    if (!$order) {
        return response()->json(['error' => 'Sipariş bulunamadı.'], 404);
    }

    // Ödeme işlemleri simülasyonu
    $paymentSuccess = $this->simulatePayment($order->total_price);

    if (!$paymentSuccess) {
        return response()->json(['error' => 'Ödeme işlemi başarısız.','order_id' => $order->id], 400);
    }

    // Ödeme başarılı, siparişi tamamla
    $order->is_completed = true;
    $order->save();

    // Fatura oluştur
    $invoiceData = [
        'order_id' => $order->id,
        'user_id' => auth()->check() ? auth()->user()->id : null,
        'amount' => $order->total_price,
        'paid_at' => now(),
    ];

    $invoice = $this->invoiceRepository->createInvoice($invoiceData);

    return response()->json(['message' => 'Ödeme tamamlandı. Fatura oluşturuldu.', 'invoice_id' => $invoice->id], 200);
}


    private function simulatePayment($amount)
    {
        // Ödeme işlemleri simülasyonu burada devam eder.
        return true;
    }
}
