<?php

namespace App\Observers;

use App\Models\Publicacao;
use App\Repositories\PublicacaoRepository;
use App\Traits\RedisTrait;

class PublicacaoObserver
{
    use RedisTrait;

    private $repo;

    public function __construct(PublicacaoRepository $repo)
    {
        $this->repo=$repo;
    }

    /**
     * Handle the publicacao "created" event.
     *
     * @param  \App\Models\Publicacao  $publicacao
     * @return void
     */
    public function created(Publicacao $publicacao)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the publicacao "updated" event.
     *
     * @param  \App\Models\Publicacao  $publicacao
     * @return void
     */
    public function updated(Publicacao $publicacao)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the publicacao "deleted" event.
     *
     * @param  \App\Models\Publicacao  $publicacao
     * @return void
     */
    public function deleted(Publicacao $publicacao)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the publicacao "restored" event.
     *
     * @param  \App\Models\Publicacao  $publicacao
     * @return void
     */
    public function restored(Publicacao $publicacao)
    {
        $this->setRedisObserve();
    }

    /**
     * Handle the publicacao "force deleted" event.
     *
     * @param  \App\Models\Publicacao  $publicacao
     * @return void
     */
    public function forceDeleted(Publicacao $publicacao)
    {
        $this->setRedisObserve();
    }

    private function setRedisObserve()
    {
        $this->setRedis('publicacoes',$this->repo->allArrayPublicacoes());
    }
}
