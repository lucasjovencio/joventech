<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Contato\ContatoService;
use App\Models\Contato;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,ContatoService $contatoService)
    {
        if($request->ajax()){
            return $contatoService->getAllContatos($request);
        }
        return view('adm.contatos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,ContatoService $contatoService)
    {
        $contato = $contatoService->find($id);
        $contato->update(['lido'=>true]);
        return view('adm.contatos.show',['contato'=>$contato]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contato::id($id)->firstOrFail()->delete();
        return redirect()->route('contato.index')->with('success','Contato removido com sucesso!');
    }
}
