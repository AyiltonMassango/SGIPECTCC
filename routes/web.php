<?php

use Barryvdh\DomPDF;
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

Route::get('/', function () {
//    return view('welcome');
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//rotas das categorias das cartas
Route::get('/categoriacarta','CategoriaCartaController@index');
Route::post('/registarcategcartas', 'CategoriaCartaController@create');
Route::get('/registarInscricao', 'InscricaoController@storePayment');

//rotas do funcionario
Route::get('/funcionario', 'FuncionarioController@create');
Route::get('/funcionario/create', 'FuncionarioController@create');
Route::get('/funcionario/store', 'FuncionarioController@store');

Route::group(['prefix'=>'inscricao'], function () {
    Route::get('/', 'InscricaoController@index');
    Route::get('/create', 'InscricaoController@create');
});
//rotas das escolas
Route::group(['prefix'=>'escola'], function (){
    Route::get('/', 'EscolaController@index');
    Route::get('create','EscolaController@create');
});
Route::post('/salvarFotoCortada','EscolaController@salvarFotoCortada');


Route::post('/read_theme','HomeController@read_theme');
Route::post('/write_theme','HomeController@write_theme');

//Inscricao
Route::post('/salvarPhoto','InscricaoController@salvarPhoto');
Route::post('/salvarInscricao','InscricaoController@store');


Route::get('/streamPDF','InscricaoController@streamPDF')->name('streamPDF');

Route::get('/teste', function (){
});