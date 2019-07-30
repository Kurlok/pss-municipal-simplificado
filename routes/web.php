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

Route::get('/', 'HomeController@index')->name('/');
Route::post('/titulos/{idCargo}', 'HomeController@getTitulos');
Route::post('/inscricao', 'InscricaoController@store');

Route::get('/exportar', 'ExportarController@index')->name('exportar')->middleware('auth');
Route::get('/exportar/inscricoes', 'InscricaoController@exportarInscricoes')->name('exportarInscricoes')->middleware('auth');
Route::get('/exportar/inscricoesTitulos', 'InscricaoController@exportarInscricoesTitulos')->name('exportarInscricoesTitulos')->middleware('auth');

Auth::routes
(
['register' => false],
['password.request' => false]
);

