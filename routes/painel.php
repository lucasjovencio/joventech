<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Painel Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('adm.dashboard');
});

Route::get('/dashboard', function () {
    return view('adm.dashboard');
});


Route::prefix('publicacoes')->group(function(){
    Route::resource('tipo-categoria','TipoCategoriaController');
    Route::get('tipo-categoria/select2/json','TipoCategoriaController@selectJson')->name('tipo.categoria.select2');
    Route::resource('categoria','CategoriaController');
    Route::resource('sub-categoria','SubCategoriaController');
    Route::resource('publicacao','PublicacaoController');
});