<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

Route::get('/','Web\HomeController@index')->name('home.index');

Route::prefix('blog')->group(function(){
    Route::get('/','Web\PublicacaoController@index')->name('home.blog');
    Route::get('/pesquisa','Web\PublicacaoController@search')->name('home.blog.search');
    Route::get('/categoria/{categoria}','Web\PublicacaoController@categoria')->name('home.blog.categoria');
    Route::get('/{id?}/{slug?}','Web\PublicacaoController@show')->name('home.blog.show');
});

Route::prefix('projetos')->group(function(){
    Route::get('/','Web\ProjetoController@index')->name('home.projeto');
    Route::get('/{id?}/{slug?}','Web\ProjetoController@show')->name('home.projeto.show');
});

