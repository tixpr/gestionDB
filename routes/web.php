
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

Route::get('/leidos', function () {
    return view('leidosporuser');
});
Route::get('/material_views', function () {
    return view('materials_views');
});
Route::get('/tipos', function () {
    return view('tipos_material');
});
Route::get('/areas', function () {
    return view('area_views');
});
Route::get('/MaterialTop', function () {
    return view('MaterialTop');
});


