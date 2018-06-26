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
    return view('cantidadmaterial');
});
Route::get('/nroleidoslec', function () {
    return view('nroleidoslec');
});

Route::get('/material_views', function () {  // estoes cmo esta en url
    return view('materials_views'); // esto es como esta en vistas
});
Route::get('/areas_views', function () {  // estoes cmo esta en url
    return view('area_views'); // esto es como esta en vistas
});
Route::get('/TipoMateriales', function () {  // estoes cmo esta en url
    return view('TipoMaterial'); // esto es como esta en vistas -----------------1
});
Route::get('/PromedioMaterials', function () {  // estoes cmo esta en url
    return view('PromedioMaterial'); // esto es como esta en vistas -----------------2
});