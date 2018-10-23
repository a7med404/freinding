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

Route::group([
    'prefix' => 'profile',
    'as' => 'profile.',
//    'middleware' => ['auth']
        ], function () {
    Route::get('', ['as' => 'index', 'uses' => 'UserSiteController@index']);
    Route::get('setting', ['as' => 'setting', 'uses' => 'UserSiteController@profileSetting']);
    Route::post('setting', ['as' => 'setting.store', 'uses' => 'UserSiteController@storeSetting']);
    Route::get('favourite', ['as' => 'favourite', 'uses' => 'UserSiteController@favourite']);
    
});

//Route::prefix('profile')->group(function() {
//    Route::get('/', 'UserSiteController@index');
////    Route::get('', ['as' => 'index', 'uses' => 'UserSiteController@index']);
//
//});
//