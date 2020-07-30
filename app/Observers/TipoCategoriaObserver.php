<?php

namespace App\Observers;

use App\Models\TipoCategoria;
use App\Traits\RedisTrait;

class TipoCategoriaObserver
{
    use RedisTrait;

    /**
     * Handle the tipo categoria "created" event.
     *
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return void
     */
    public function created(TipoCategoria $tipoCategoria)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the tipo categoria "updated" event.
     *
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return void
     */
    public function updated(TipoCategoria $tipoCategoria)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the tipo categoria "deleted" event.
     *
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return void
     */
    public function deleted(TipoCategoria $tipoCategoria)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the tipo categoria "restored" event.
     *
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return void
     */
    public function restored(TipoCategoria $tipoCategoria)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the tipo categoria "force deleted" event.
     *
     * @param  \App\Models\TipoCategoria  $tipoCategoria
     * @return void
     */
    public function forceDeleted(TipoCategoria $tipoCategoria)
    {
        $this->setRedisObserve();
    }

    private function setRedisObserve()
    {
        $this->setRedis('tipo-categorias',TipoCategoria::all()->toArray());
    }
}
