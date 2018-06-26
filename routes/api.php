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
    Route::get('languages','Api\LanguageController@index');
    Route::get('materialtype','Api\MaterialTypeController@index');
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
    Route::get('numero_materials','Api\MaterialController@getNumeroMat');
    Route::get('usuario_lectura','Api\MaterialController@getUsuarioLectura');
    Route::get('material_views','Api\MaterialController@topViews');
    Route::get('area_views','Api\MaterialController@topAreas');
    Route::get('tipo_material','Api\MaterialController@tipomaterial');
    Route::get('promedio','Api\MaterialController@Promedio');
});
