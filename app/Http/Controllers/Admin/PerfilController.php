<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePerfilRequest;
use App\Http\Requests\StorePerfilPasswordRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
class PerfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return view('adm.perfil.index');
    }

    public function update(StorePerfilRequest $request)
    {
        auth()->user()->update([
            'name'      =>  $request->name,
            'lastname'  =>  $request->lastname,
            'email'     =>  $request->email,
            'foto'      =>  $request->foto,
        ]);
        return redirect()->back()->with('success','Perfil atualizado com sucesso!');
    }

    public function password(StorePerfilPasswordRequest $request)
    {
        if(!Hash::check($request->current,auth()->user()->password)):
            return redirect()->back()->with('danger','Senha atual inválida.');
        endif;
        auth()->user()->update(['password'=>Hash::make($request->password)]);
        return redirect()->back()->with('success','Senha atualizada com sucesso!');
    }
}
