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
Route::get('/languages', function () {
    return view('languages');
});
Route::get('/nameuser', function () {
    return view('nameuser');
});
Route::get('/material_view', function () {
    return view('materials_views');
});
Route::get('/areas_view', function () {
    return view('area_views');
});
Route::get('/type_view', function () {
    return view('type_views');
});
Route::get('/title_view', function () {
    return view('title_views');
});