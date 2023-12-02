<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('products')->group(function () {
    Route::post('/', [ProductController::class, 'store']);
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::put('/{productId}', [ProductController::class, 'update']);
    Route::delete('/{productId}', [ProductController::class, 'destroy']);
});

Route::prefix('orders')->group(function () {
    Route::post('/', [OrderController::class, 'createOrder']);
    Route::post('/pay', [OrderController::class, 'makePayment']);
});

Route::prefix('invoices')->group(function () {
    Route::get('/{invoiceId}', [InvoiceController::class, 'showInvoice']);
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
