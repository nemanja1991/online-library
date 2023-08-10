<?php

namespace App\Providers;

use App\Services\BookService;
use App\Services\AuthorService;
use App\Repositories\BookRepository;
use App\Repositories\AuthorRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(BookRepository::class, function ($app) {
            return new BookRepository();
        });

        $this->app->bind(BookService::class, function ($app) {
            return new BookService($app->make(BookRepository::class));
        });

        $this->app->bind(AuthorRepository::class, function ($app) {
            return new AuthorRepository();
        });

        $this->app->bind(AuthorService::class, function ($app) {
            return new AuthorService($app->make(AuthorRepository::class));
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
