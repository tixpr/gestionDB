
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

Route::get('/views', function () {
    return view('views_user');
});
Route::get('/material_views', function () {
    return view('materials_views');
});
Route::get('/areas_views', function () {
    return view('area_views');
});
Route::get('/type_views', function () {
    return view('types_views');
});
Route::get('/read_materials', function () {
    return view('read_materials');
});