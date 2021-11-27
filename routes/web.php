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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('vuevendedor', 'VendedorController');
Route::get('/vendedor', 'VendedorController@lista');
Route::put('/vendedor/actualizar', 'VendedorController@update');
Route::post('/vendedor/guardar', 'VendedorController@store');
Route::delete('/vendedor/borrar/{idvendedor}', 'VendedorController@destroy');
Route::get('/vendedor/buscar', 'VendedorController@show');


Route::resource('cliente', 'ClienteController');
Route::get('/cliente', 'ClienteController@lista');
Route::get('cliente-vue/descarga', 'ClienteController@createPDF');
Route::get('cliente-vue/lista', 'ClienteController@lista');
Route::put('/cliente/actualizar', 'ClienteController@update');
Route::post('/cliente/guardar', 'ClienteController@store');
Route::delete('/cliente/borrar/{idcliente}', 'ClienteController@destroy');
Route::get('/cliente/buscar', 'ClienteController@show');
Route::resource('vuecliente', 'ClienteController');

Route::resource('producto', 'productoController');
Route::get('producto-vue/lista', 'ProductoController@lista');
Route::get('producto-vue/descarga', 'ProductoController@createPDF');
Route::get('/producto', 'productoController@lista');
Route::put('/producto/actualizar', 'productoController@update');
Route::post('/producto/guardar', 'productoController@store');
Route::delete('/producto/borrar/{idproducto}', 'productoController@destroy');
Route::get('/producto/buscar', 'productoController@show');
Route::resource('vueproducto', 'productoController');

Route::resource('vuedetalle', 'DetalleController');
Route::get('/detalles', 'DetalleController@lista');
Route::get('detalles-vue/descarga', 'DetalleController@createPDF');
Route::get('detalles-vue/lista', 'DetalleController@lista');
Route::put('/detalles/actualizar', 'DetalleController@update');
Route::post('/detalles/guardar', 'DetalleController@store');
Route::delete('/detalles/borrar/{iddetalle}', 'DetalleController@destroy');
Route::get('/detalles/buscar', 'DetalleController@show');
