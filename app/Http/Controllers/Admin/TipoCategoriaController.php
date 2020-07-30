<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TipoCategoria;
use Illuminate\Http\Request;
use App\Http\Resources\TipoCategoria as TipoCategoriaResource;
use App\Services\Categoria\TipoCategoriaService;


class TipoCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,TipoCategoriaService $tipoCategoriaService)
    {  
        if($request->ajax()){
            return $tipoCategoriaService->getTipoCategoriasDataTable($request);
        }
        return view('adm.categorias.tipo-categoria');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        TipoCategoria::create($request->only('nome'));
        return redirect()->back()->with('success','Tipo de categoria criada com sucesso!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        TipoCategoria::id($id)->firstOrFail()->update($request->only('nome'));
        return redirect()->back()->with('success','Tipo de categoria atualizada sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoCategoria::id($id)->firstOrFail()->delete();
        return redirect()->back()->with('success','Tipo de categoria removida com sucesso!');
    }


    /**
     * Display a listing of the select2.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectJson(TipoCategoriaService $tipoCategoriaService)
    {
        return TipoCategoriaResource::collection($tipoCategoriaService->all());
    }
}
