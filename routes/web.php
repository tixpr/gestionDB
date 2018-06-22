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
Route::get('/vistas', function () {
    return view('vistas');
});
Route::get('/cantidad_mat', function () {
    return view('cantidadmat');
});
Route::get('/nro_leido', function () {
    return view('nro_leido');
});
Route::get('/top_material', function () {
    return view('material_view');
});
Route::get('/top_area', function () {
    return view('top_areas');
});
 