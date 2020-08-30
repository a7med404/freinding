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

Route::middleware('auth:api')->get('/usersite', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => '/profile'], function () {

    // Route::get('/@{username?}', 'UserSiteController@index');
    // Route::get('/add-friend/{id}', function(){
    //   dd(Auth::user());
    // });// 'UserSiteController@apiAddFriend');
    // Route::get('/@{username?}/friends','UserSiteController@friends');
    // Route::get('/@{username?}/followers','UserSiteController@followers');
    // Route::get('/@{username?}/following','UserSiteController@following');

});
