<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Publicacao\DepoimentoService;
use App\Http\Requests\StoreDepoimentoRequest;
use App\Models\Publicacao;
use App\Traits\RedisTrait;

class DepoimentoController extends Controller
{
    use RedisTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,DepoimentoService $depoimentoService)
    {
        if($request->ajax()){
            return $depoimentoService->getAllDepoimentosDataTable($request);
        }
        return view('adm.depoimentos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.depoimentos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDepoimentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepoimentoRequest $request,DepoimentoService $depoimentoService)
    {
        $depoimentoService->create($request);
        return redirect()->route('depoimento.index')->with('success','Depoimento criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('adm.depoimentos.show',['depoimento'=>$this->findRedis('publicacoes',$id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreDepoimentoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepoimentoRequest $request, $id,DepoimentoService $depoimentoService)
    {
        $depoimentoService->update($id,$request);
        return redirect()->back()->with('success','Depoimento atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Publicacao::id($id)->firstOrFail()->delete();
        return redirect()->back()->with('success','Publicação removida com sucesso!');
    }
}
