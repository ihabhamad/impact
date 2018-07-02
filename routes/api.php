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

//Route::group(['middleware' => 'auth:api','prefix' => 'v1'], function(){
////    Route::post('chick', function(Request $request){
////      return response($request->all(),200);
////    });
//    Route::get('chick', function(){
//        return response()->json([1,2,3,4],200);
//    });
//});

Route::middleware('auth:api')->prefix('v1')->group(function () {
    Route::get('/impactnetworks','api\handlerController@ImpactNetworks');
    Route::get('/experiances','api\handlerController@experiances');
    Route::get('/guidances','api\handlerController@guidances');
    Route::get('/register','api\UserController@Register');
});

Route::post('/auth/token' , 'Auth\AccessTokenController@issueToken')->name('auth.tokenByPassword');


