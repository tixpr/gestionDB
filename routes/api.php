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
    Route::get('materials_languages_quantity','Api\MaterialController@getMaterialsLanguagesQuantity');
    Route::get('languages','Api\LanguageController@index');
    Route::get('materialstype','Api\MaterialTypeController@index');
    Route::get('materiallang','Api\MaterialLanguageController@index');
    Route::get('materials_views','Api\MaterialController@topViews');
    Route::get('areas_views','Api\MaterialController@topAreas');
    Route::get('tipo_views','Api\MaterialController@topTipo');
    Route::get('media_views','Api\MaterialController@mediaLectura');
    
});
