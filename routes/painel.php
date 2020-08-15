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



Route::group(['prefix' => 'laravel-filemanager'], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('/', function () {
    return view('adm.dashboard');
})->name('dashboard');

Route::prefix('publicacoes')->group(function(){
    Route::get('categoria/json','CategoriaController@categoriaJson')->name('categoria.json');
    Route::resource('categoria','CategoriaController');
    Route::resource('sub-categoria','SubCategoriaController');
    Route::resource('publicacao','PublicacaoController');
    Route::get('publicacao/categoria/json/{id?}','PublicacaoController@categoriaJson')->name('publicacao.categoria.json');
});

Route::resource('depoimento','DepoimentoController');
Route::resource('projeto','ProjetoController');
Route::resource('lead','LeadController');

Route::prefix('perfil')->group(function(){
    Route::get('/','PerfilController@index')->name('perfil');
    Route::post('update/{id}','PerfilController@update')->name('perfil.update');
    Route::post('update/password/{id}','PerfilController@password')->name('perfil.update.password');
});
