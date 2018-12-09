<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('getDistritos','EscolaController@getDistritos')->name('getDistritos');
Route::post('getCategoriaCarta','EscolaController@getCategoriaCarta')->name('getCategoriaCarta');
Route::post('getCategoriaFuncionario','FuncionarioController@getCategoriaFuncionario')->name('getCategoriaFuncionario');
Route::post('salvarEscola','EscolaController@store')->name('salvarEscola');
Route::post('salvarFuncionario','FuncionarioController@storeDirector')->name('salvarFuncionario');
Route::post('salvarEndereco','EnderecoController@store');
Route::post('salvarAluno','AlunoController@store');
Route::post('salvarContactAluno','ContactoController@storeAluno');

