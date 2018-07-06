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

Route::middleware(['auth:api','cors'])->group(function(){
    Route::get('materials','Api\MaterialController@index'); 
    Route::get('languages','Api\LanguageController@index');    
    Route::get('materialTypes','Api\MaterialTypeController@index');
    Route::get('users','Api\UserController@index');
    Route::get('user_materials_view','Api\MaterialController@getUserMaterialsView');
    Route::get('languages_material','Api\MaterialController@getLanguage');
    Route::get('material_views','Api\MaterialController@topViews');
    Route::get('area_views','Api\MaterialController@topAreas');
    Route::get('cant_types','Api\MaterialController@tipoCant');
    Route::get('prom_materials','Api\MaterialController@promMat');
});
