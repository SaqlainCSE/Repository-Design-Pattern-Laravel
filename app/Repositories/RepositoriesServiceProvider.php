<?php

namespace App\Repositories;

use Illuminate\Support\ServiceProvider;
use App\Repositories\AdminInterface;
use App\Repositories\AdminRepository;

class RepositoriesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            AdminInterface::class,
            AdminRepository::class
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
