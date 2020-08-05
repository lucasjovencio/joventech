<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjetoRequest;
use App\Models\Publicacao;
use App\Services\Publicacao\ProjetoService;
use App\Traits\RedisTrait;
use Illuminate\Http\Request;

class ProjetoController extends Controller
{
    use RedisTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,ProjetoService $projetoService)
    {
        if($request->ajax()){
            return $projetoService->getAllProjetosDataTable($request);
        }
        return view('adm.projetos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adm.projetos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreDepoimentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjetoRequest $request,ProjetoService $projetoService)
    {
        $projetoService->create($request);
        return redirect()->route('projeto.index')->with('success','Projeto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('adm.projetos.show',['projeto'=>$this->findRedis('publicacoes',$id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\StoreDepoimentoRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProjetoRequest $request, $id,ProjetoService $projetoService)
    {
        $projetoService->update($id,$request);
        return redirect()->back()->with('success','Projeto atualizado com sucesso!');
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
        return redirect()->route('projeto.index')->with('success','Projeto removido com sucesso!');
    }
}
