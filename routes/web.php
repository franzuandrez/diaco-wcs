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
Route::get('/departamentos/{id}', 'DepartamentoController@edit')->name('departamentos.edit');
Route::patch('/departamentos/{id}', 'DepartamentoController@update')->name('departamentos.update');
Route::get('/municipios', 'MunicipioController@index')->name('municipios');
Route::get('/municipios/create', 'MunicipioController@create')->name('municipios.create');
Route::post('/municipios', 'MunicipioController@store')->name('municipios.store');
Route::get('/municipios/{id}', 'MunicipioController@edit')->name('municipios.edit');
Route::patch('/municipios/{id}', 'MunicipioController@update')->name('municipios.update');
Route::get('/comercios', 'ComercioController@index')->name('comercios');
Route::get('/comercios/{id}', 'ComercioController@edit')->name('comercios.edit');
Route::patch('/comercios/{id}', 'ComercioController@update')->name('comercios.update');
Route::get('/comercios/{id}/sucursal', 'SucursalController@create')->name('sucursales.create');
Route::post('sucursales', 'SucursalController@store')->name('sucursales.store');
Route::delete('/sucursales/{id}', 'SucursalController@destroy')->name('sucursales.destroy');
