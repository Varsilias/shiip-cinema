<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MovieRepositoryInterface;
use App\Repositories\MovieRepository;
use App\Repositories\CinemaRepositoryInterface;
use App\Repositories\CinemaRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
        $this->app->bind(CinemaRepositoryInterface::class, CinemaRepository::class);
    }
}
