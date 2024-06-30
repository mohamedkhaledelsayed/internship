<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\RepositryPattern\Interfaces\CategoryInterface;
use App\RepositryPattern\Interfaces\ProductInterface;
use App\RepositryPattern\Repositries\CategoryRepo;
use App\RepositryPattern\Repositries\ProductRepo;


class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepo::class);
        $this->app->bind(ProductInterface::class, ProductRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
