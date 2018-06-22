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
Route::get('/cantidad', function () {
    return view('cantidad');
});
Route::resource('vistas', 'UserNameController');

Route::get('/topViews', function () {
    return view('topViews');
});
Route::get('/areaViews', function () {
    return view('areaViews');
});