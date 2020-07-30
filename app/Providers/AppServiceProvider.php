<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Models
use App\Models\Categoria;
use App\Models\TipoCategoria;

// Observers
use App\Observers\CategoriaObserver;
use App\Observers\TipoCategoriaObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        TipoCategoria::observe(TipoCategoriaObserver::class);
        Categoria::observe(CategoriaObserver::class);
    }
}
