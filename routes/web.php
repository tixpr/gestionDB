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
<<<<<<< HEAD
Route::get('/', function () {
    return view('vistas');
});
=======
Route::get('/vistas', function () {
    return view('vistas');
});
>>>>>>> 2dc8c2b98e13a7099569d1d48fbff628f5b4b321
