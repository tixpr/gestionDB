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
Route::get('/materials', function () {
    return view('materialporlanguage');
});
Route::get('/cantidad', function () {
    return view('cantidadleida');
});
Route::get('/material_views', function () {
    return view('materials_views');
});
Route::get('/Area_views', function () {
    return view('Area_views');
});
Route::get('/material_view', function () {
    return view('topMaterials_View');
});
Route::get('/Area_material_view', function () {
    return view('AreaTypeMaterials');
});



