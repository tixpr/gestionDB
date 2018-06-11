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
<<<<<<< HEAD
    Route::get('language','Api\LanguageController@index');
    Route::get('materialtype','Api\MaterialTypeController@index');

=======
    Route::get('languages','Api\LanguageController@index');
    Route::get('materialstype','Api\MaterialtypeController@index');
>>>>>>> a149452c5d4769b16f8d85034ab6608beec30723
});
