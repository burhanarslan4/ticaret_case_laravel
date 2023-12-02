<?php

use App\Repositories\Contracts\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
use App\Services\OrderService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ProductRepositoryInterface bağlaması için ProductRepository'yi tanımla
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        // OrderService bağlaması için OrderService'yi tanımla
        $this->app->singleton(OrderService::class, function ($app) {
            return new OrderService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
