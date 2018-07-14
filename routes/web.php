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

//nuevas rutas para ver en la web cada una de las vistas creadas
Route::get('/material/get', 'Web\MaterialController@show');
Route::get('/material/post', 'Web\MaterialController@store');
Route::get('/material/put', 'Web\MaterialController@update');
Route::get('/material/delete', 'Web\MaterialController@destroy');



Route::get('/vistas', function () {
    return view('vistas');
});
Route::get('/material_views', function () {
    return view('materials_views');
});
Route::get('/areas_views', function () {
    return view('area_views');
});
