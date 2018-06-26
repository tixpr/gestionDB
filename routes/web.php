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
Route::get('/materials_views', function () {    //esto es como está en url
    return view('materials_views'); //estos es como está en vistas
});
Route::get('/areas_views', function () {
    return view('area_views');
});
Route::get('/types_materials_cant', function () {
    return view('types_materials_cant');
});
Route::get('/read_materials_half', function () {
    return view('read_materials_half');
});