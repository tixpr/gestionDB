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
Route::get('/material_views', function () {
    return view('materials_views');
});
Route::get('/areas_views', function () {
    return view('area_views');
});
Route::get('/types_materials_views', function () {
    return view('types_materials_view');
});
Route::get('/types_materials_views', function () {
    return view('types_materials_view');
});
Route::get('/titulo_material_view', function () {
    return view('titulo_material_view');
});
