<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Http\Requests\StoreContatoRequest;
use App\Services\Contato\ContatoService;

class ContatoController extends Controller
{
    use JsonResponseTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContatoRequest $request,ContatoService $contatoService)
    {
        try{
            $contatoService->create($request);
            return $this->jsonResponseSuccess('success',201);
        }catch(Exception $e){
            return $this->jsonResponseError("Ops...",$e->getStatus());
        }
        
    }

}
