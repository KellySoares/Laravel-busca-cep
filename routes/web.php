<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'EnderecoController@index')->name('home');
Route::get('/lista', 'EnderecoController@listaEndereco')->name('listaEndereco');
Route::get('/adicionarCep', 'EnderecoController@adicionarCEP')->name('adicionarCep');
Route::get('/buscarCep', 'EnderecoController@buscarCEP')->name('buscarCep');
Route::get('/adicionarEndereco', 'EnderecoController@adicionarEndereco')->name('adicionarEndereco');
Route::get('/buscarEndereco', 'EnderecoController@buscarEndereco')->name('buscarEndereco');
Route::get('/resultadoEnd', 'EnderecoController@resultadoEndereco')->name('resultadoEnd');
Route::post('/salvar', 'EnderecoController@salvar')->name('salvar');
