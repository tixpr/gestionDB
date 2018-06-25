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
Route::get('/veces_leido', function () {
    return view('veces_leido');
});
Route::get('/cant_mat', function () {
    return view('cantmat');
});
Route::get('/material_views', function () {
    return view('materials_views');
});
Route::get('/areas_views', function () {
    return view('top_areas');
});
Route::get('/leido_por_tipo', function () {
    return view('leido_por_tipo');
});
Route::get('/problema_2', function () {
    return view('problema2');
});