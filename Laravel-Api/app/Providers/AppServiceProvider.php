<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\AuthorService;
use App\Repository\BookRepository;
use App\Repository\AuthorRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\BookRepositoryInterface;
use App\Repository\AuthorRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthorRepositoryInterface::class, AuthorRepository::class);
        $this->app->bind(AuthorService::class, function ($app) {
            return new AuthorService($app->make(AuthorRepositoryInterface::class));
        });
        $this->app->bind(BookRepositoryInterface::class, BookRepository::class);
        $this->app->bind(BookService::class, function ($app) {
            return new BookService($app->make(BookRepositoryInterface::class));
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
