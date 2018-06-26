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
Route::get('/lenguages', function () {
    return view('lenguages');
});
Route::get('/usuarios', function () {
    return view('usuarios');
});
Route::get('/materials_views', function () {
    return view('materials_views');
});
Route::get('/base', function () {
    return view('base');
});
Route::get('/area_views', function () {
    return view('area_views');
});
Route::get('/tipo_vistas', function () {
    return view('tipo_vistas');
});
Route::get('/cantidad_lecturas', function () {
    return view('cantidad_lecturas');
});