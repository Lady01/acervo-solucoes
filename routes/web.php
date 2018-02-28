<?php

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
    return view('welcome');
});
Route::get('categoria/', 'CategoriaController@index');
Route::post('categoria/', 'CategoriaController@store');
Route::put('categoria/{id}', 'CategoriaController@update');
Route::delete('categoria/{id}', 'CategoriaController@destroy');


Route::get('erro/{id}', 'ErroController@index');
Route::get('erro/busca/termo/{termo}', 'ErroController@show');
Route::post('erro/', 'ErroController@store');
Route::put('erro/{id}', 'ErroController@update');
Route::delete('erro/{id}', 'ErroController@destroy');


Route::get('solucao/{id}', 'SolucaoController@index');
Route::post('solucao/', 'SolucaoController@store');
Route::put('solucao/{id}', 'SolucaoController@update');
Route::delete('solucao/{id}', 'SolucaoController@destroy');