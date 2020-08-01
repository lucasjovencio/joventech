<?php

namespace App\Observers;

use App\Models\Categoria;
use App\Traits\RedisTrait;
use App\Repositories\CategoriaRepository;

class CategoriaObserver
{
    use RedisTrait;

    private $repo;

    public function __construct(CategoriaRepository $repo)
    {
        $this->repo=$repo;
    }

    /**
     * Handle the categoria "created" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function created(Categoria $categoria)
    {
        $this->setRedisObserve($categoria);
    }

    /**
     * Handle the categoria "updated" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function updated(Categoria $categoria)
    {
        $this->setRedisObserve($categoria);
    }

    /**
     * Handle the categoria "deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function deleted(Categoria $categoria)
    {
        $this->setRedisObserve($categoria);
    }

    /**
     * Handle the categoria "restored" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function restored(Categoria $categoria)
    {
        $this->setRedisObserve($categoria);
    }

    /**
     * Handle the categoria "force deleted" event.
     *
     * @param  \App\Models\Categoria  $categoria
     * @return void
     */
    public function forceDeleted(Categoria $categoria)
    {
        $this->setRedisObserve($categoria);
    }


    private function setRedisObserve(Categoria $categoria)
    {
        if($categoria->isParent()){
            $this->setRedis("subcategorias{$categoria->categorias_id}",$this->repo->allArrayParents($categoria->categorias_id));
        }else{
            $this->setRedis('categorias',$this->repo->allArrayCategorias());
        }
    }
}
