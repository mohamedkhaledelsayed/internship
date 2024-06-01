<?php

namespace App\Providers;

use App\Services\RoleService;
use App\Services\UserService;
use App\Services\ProductService;
use app\Repository\RoleInterface;
use app\Repository\UserInterface;
use App\Services\CategoryService;
use App\Repository\RoleRepository;
use App\Repository\UserRepository;
use App\Services\PermissionService;
use App\Repository\ProductInterface;
use App\Repository\CategoryInterface;
use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use app\Repository\PermissionInterface;
use Illuminate\Support\ServiceProvider;
use App\Repository\PermissionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryInterface::class));
        });
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(ProductService::class, function ($app) {
            return new ProductService($app->make(ProductInterface::class));
        });
        $this->app->bind(PermissionInterface::class, PermissionRepository::class);
        $this->app->bind(PermissionService::class, function ($app) {
            return new PermissionService($app->make(PermissionInterface::class));
        });
        $this->app->bind(RoleInterface::class, RoleRepository::class);
        $this->app->bind(RoleService::class, function ($app) {
            return new RoleService($app->make(RoleInterface::class));
        });

        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(UserService::class, function ($app) {
            return new UserService($app->make(UserInterface::class));
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
