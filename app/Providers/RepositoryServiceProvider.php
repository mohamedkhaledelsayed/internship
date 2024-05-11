<?php

namespace App\Providers;

use app\Repositories\Category\Categoryinterface;
use App\Repositories\Category\CategoryRepositry;
use App\Repositories\Product\productinterface;
use App\Repositories\Product\productRepository;
use app\Repositories\Product\ProductRepositry;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            CategoryRepositry::class,
            Categoryinterface::class,
            ProductRepositry::class,
            productinterface::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
