<?php

namespace App\Providers;
use App\Repositories\BookRepository;
use App\Services\BookService;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
