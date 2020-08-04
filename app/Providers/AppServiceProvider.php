<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Models
use App\Models\Categoria;
use App\Models\Publicacao;

// Observers
use App\Observers\CategoriaObserver;
use App\Observers\PublicacaoObserver;

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
        Categoria::observe(CategoriaObserver::class);
        Publicacao::observe(PublicacaoObserver::class);
    }
}
