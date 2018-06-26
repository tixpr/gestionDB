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
Route::get('/Idiomas', function () {
    return view('Idiomas');
});
Route::get('/materials_view', function () {
    return view('materials_view');
});
Route::get('/area_views', function () {
    return view('area_views');
});
Route::get('/tipomat', function () {
    return view('tipomat');
});
Route::get('/Tpro', function () {
    return view('prom');
});

