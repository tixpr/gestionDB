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
Route::get('/tipo_views', function () {
    return view('tipo_views');
});
Route::resource('cantidad','LanguageController');
Route::resource('vistas','UsuariosController');

