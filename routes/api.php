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
    Route::get('Languages','Api\LanguageController@index');
    Route::get('MaterialTypes','Api\MaterialTypeController@index');
    Route::get('MaterialPorIdioma','Api\MaterialController@getUserMaterialsLanguageView');
    Route::get('materialsReadUser','Api\MaterialController@getMaterialsReadUser');
    Route::get('matertial_views','Api\MaterialController@topViews');
    Route::get('area_views','Api\MaterialController@topAreas');
});
