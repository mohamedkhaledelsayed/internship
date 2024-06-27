<?php

namespace App\Providers;

use App\Repository\CarRepository;
use App\Repository\CarRepositoryInterface;
use App\Repository\CategoryRepository;
use App\Repository\CategoryRepositoryInterface;
use App\Services\CarService;
use App\Services\CategoryService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryRepositoryInterface::class));
        });
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
        $this->app->bind(CarService::class, function ($app) {
            return new CarService($app->make(CarRepositoryInterface::class));
        });
    }
}
