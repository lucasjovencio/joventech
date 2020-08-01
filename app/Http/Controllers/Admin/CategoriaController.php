<?php

namespace App\Http\Controllers\Admin;

use App\Services\Categoria\CategoriaService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\RedisTrait;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    use RedisTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,CategoriaService $categoriaService)
    {
        if($request->ajax()){
            return $categoriaService->getCategoriasDataTable($request);
        }
        return view('adm.categorias.categoria');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Categoria::create($request->only('nome','tipo_categorias_id'));
        return redirect()->back()->with('success','Categoria criada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        return view('adm.categorias.show-categoria',[
            'categoria' => $this->findRedis('categorias',$id)
        ]);
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
        Categoria::id($id)->firstOrFail()->update([
            'nome'=>$request->nome,
            'tipo_categorias_id'=>$request->tipo_categorias_id
        ]);
        return redirect()->back()->with('success','Categoria atualizada sucesso!');
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
        return redirect()->back()->with('success','Categoria removida com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoriaJson($id,CategoriaService $categoriaService)
    {
        return response()->json($categoriaService->getCategoriasSubCategorias($id),200);
    }
}
