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
    return view('language');
});
Route::get('/leidos', function () {
    return view('leidos');
});
Route::get('/materias_views', function () {
    return view('materials_views');
});
Route::get('/areas_views', function () {
    return view('areas_views');
});
Route::get('/type_views', function () {
    return view('type_views');
});
Route::get('/cantidad_views', function () {
    return view('cantidad_views');
});