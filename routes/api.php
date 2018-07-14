<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware(['auth:api','cors'])->group(function (){
	Route::get('materials','Api\MaterialController@index');
	
	//nuevas rutas para el post put y delete
	Route::post('material','Api\MaterialController@store');//creando un nuevo material
	Route::get('material/{id}','Api\MaterialController@show');//obteniendo un material especifico
	Route::put('material/{id}','Api\MaterialController@update');//actualizando un material especifico
	Route::delete('material/{id}','Api\MaterialController@destroy');//eliminando un material especfico



	Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
	Route::get('material_views','Api\MaterialController@topViews');
	Route::get('areas_views','Api\MaterialController@topAreas');
});
