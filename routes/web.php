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
Route::get('/idiomas', function () {
    return view('idiomas');
});
Route::get('/nombres', function () {
    return view('nombre');
});
Route::get('/materials_views', function () {
    return view('materials_views');
});
Route::get('/areas_views', function () {
    return view('area_views');
});
Route::get('/material_type_views', function () {
    return view('material_type_views');
});
Route::get('/cantidad_materiales', function () {
    return view('count_materials');
});