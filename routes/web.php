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
Route::get('/quantity', function () {
    return view('quantity');
});
Route::get('/reading', function () {
    return view('reading');
});

Route::get('/materials_views', function () {
    return view('materials_views');
});
Route::get('/area_views', function () {
    return view('area_views');
});
Route::get('/material_type', function () {
    return view('materialtypequantity');
});