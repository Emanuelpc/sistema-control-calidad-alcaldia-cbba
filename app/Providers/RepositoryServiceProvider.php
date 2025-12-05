<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\ServicioRepository;
use App\Services\Validations\ServicioValidator;
use App\Services\Core\ServicioService;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ServicioService::class, function ($app) {
            return new ServicioService(
                new ServicioRepository(),
                new ServicioValidator()
            );
        });
        $this->app->singleton(\App\Services\Core\AdministracionService::class, function ($app) {
            return new \App\Services\Core\AdministracionService(
                $app->make(\App\Repositories\ServicioRepository::class)
            );
        });
    }

    public function boot()
    {
        //
    }
}