<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\JsonResponseTrait;
use App\Http\Requests\StoreLeadRequest;
use App\Services\Lead\LeadService;

class LeadController extends Controller
{
    use JsonResponseTrait;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLeadRequest $request,LeadService $leadService)
    {
        try{
            $leadService->create($request);
            return $this->jsonResponseSuccess('success',201);
        }catch(Exception $e){
            return $this->jsonResponseError("Ops...",500);
        }
        
    }

}
