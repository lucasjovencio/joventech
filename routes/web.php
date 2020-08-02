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
    Route::get('/','Web\PublicacoesController@index')->name('home.blog');
    Route::get('/pesquisa','Web\PublicacoesController@search')->name('home.blog.search');
    Route::get('/categoria/{categoria}','Web\PublicacoesController@categoria')->name('home.blog.categoria');
    Route::get('/{id?}','Web\PublicacoesController@show')->name('home.blog.show');
});