<?php

namespace App\Providers;

use App\RepositryPattern\CategoriesInterface;
use App\RepositryPattern\ProductsInterface;

use App\RepositryPattern\CategoryRepo;
use App\RepositryPattern\ProductRepo;


use Illuminate\Support\ServiceProvider;

class RepositryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoriesInterface::class,CategoryRepo::class);
        $this->app->bind(ProductsInterface::class,ProductRepo::class);

    }
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

