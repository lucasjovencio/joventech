<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Services\Categoria\PublicacaoCategoriaService;
use App\Services\Publicacao\PublicacaoService;
use App\Traits\RedisTrait;

class PublicacaoController extends Controller
{
    use RedisTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,PublicacaoService $publicacaoService)
    {
        if($request->ajax()){
            return $publicacaoService->getAllPublicacoes($request);
        }
        return view('adm.publicacoes.index');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,PublicacaoService $publicacaoService)
    {
        $publicacaoService->create($request);
        return redirect()->route('publicacao.index')->with('success','Publicação criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,PublicacaoService $publicacaoService)
    {
        return view('adm.publicacoes.show',['publicacao'=>$this->findRedis('publicacoes',$id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,PublicacaoService $publicacaoService)
    {
        $publicacaoService->update($id,$request);
        return redirect()->back()->with('success','Publicação atualizada com sucesso!');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoriaJson($id,PublicacaoCategoriaService $publicacaoCategoriaService)
    {
        return response()->json($publicacaoCategoriaService->getRedisPublicacaoCategorias($id),200);
    }
}
