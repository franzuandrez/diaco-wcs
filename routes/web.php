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

Route::get('/', function () {


    return view('welcome');

});




Route::get('/quejas', 'QuejaController@create')->name('queja.create');
Route::post('/quejas', 'QuejaController@store')->name('queja.store');
Route::get('/estadisticas', 'EstadisticasController@index')->name('estadisticas');
Route::get('/regiones', 'RegionController@index')->name('regiones');
Route::get('/regiones/{id}', 'RegionController@edit')->name('regiones.edit');
Route::patch('/regiones/{id}', 'RegionController@update')->name('regiones.update');
Route::get('/departamentos', 'DepartamentoController@index')->name('departamentos');
Route::get('/municipios', 'MunicipioController@index')->name('municipios');
Route::get('/comercios', 'ComercioController@index')->name('comercios');
