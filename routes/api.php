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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('cors')->group(function(){
	Route::get('materials','Api\MaterialController@index');
	Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
	Route::get('idiomamaterialsview','Api\MaterialController@getIdiomaMaterialsView');
	Route::get('areas_views','Api\MaterialController@topAreas');
	Route::get('material_views','Api\MaterialController@topViews');
	Route::get('tipo_material_views','Api\MaterialController@topTipos');
	Route::get('lectura_material_views','Api\MaterialController@topLecturaMaterial');
});
