<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Services\Categoria\SubCategoriaService;

class SubCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,SubCategoriaService $subCategoriaService)
    {
        if($request->ajax()){
            return $subCategoriaService->getSubCategoriasDataTable($request,$request->id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categoria::create($request->only('nome','categorias_id'));
        return redirect()->back()->with('success','Sub-categoria criada com sucesso!');
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
        Categoria::id($id)->firstOrFail()->update($request->only('nome'));
        return redirect()->back()->with('success','Sub-categoria atualizada sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categoria::id($id)->firstOrFail()->delete();
        return redirect()->back()->with('success','Sub-categoria removida com sucesso!');
    }
}
