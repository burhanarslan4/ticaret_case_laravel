<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Models\Product;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return response()->json($products);
    }

    public function show($productId)
    {
        $product = $this->productService->getProductById($productId);
        return response()->json($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'description' => 'nullable|string',
            'category' => 'nullable|string',
        ]);

        $product = $this->productService->createProduct($data);
        return response()->json($product, 201);
    }

    public function update(Request $request, $productId)
{
    $data = $request->validate([
        'name' => 'string',
        'price' => 'numeric',
        'stock' => 'integer',
        'description' => 'nullable|string',
        'category' => 'nullable|string',
    ]);

    $product = $this->productService->updateProduct($productId, $data);
    if ($product) {
        return response()->json(['message' => 'Ürün güncellendi', 'product' => $product]);
    } else {
        return response()->json(['error' => 'Ürün bulunamadı'], 404);
    }
}
    public function destroy($productId)
    {
        $this->productService->deleteProduct($productId);
        return response()->json(['message' => 'Ürün silindi']);
    }
}
