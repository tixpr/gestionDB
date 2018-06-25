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
Route::get('/types_views', function () {
    return view('types_views_e1');
});
Route::get('/types_e2', function () {
    return view('type_area_views');
});