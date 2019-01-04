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
    'middleware' => ['auth']
], function () {
    Route::get('', ['as' => 'index', 'uses' => 'UserSiteController@index']);
    Route::get('setting', ['as' => 'setting', 'uses' => 'UserSiteController@profileSetting']);
    Route::get('changepassword', ['as' => 'changepassword', 'uses' => 'UserSiteController@changepasswordSetting']);
    Route::post('setting', ['as' => 'setting.store', 'uses' => 'UserSiteController@storeSetting']);

    Route::get('account', ['as' => 'countsetting', 'uses' => 'UserSiteController@countSetting']);
    Route::post('account', ['as' => 'countsetting.store', 'uses' => 'UserSiteController@storeCount']);
    Route::get('statistics', ['as' => 'statistics', 'uses' => 'UserSiteController@statistics']);

    Route::get('verification', ['as' => 'verification', 'uses' => 'UserSiteController@getverify']);

    Route::get('stage', ['as' => 'stage', 'uses' => 'UserSiteController@getstage']);


});
//route for track session
Route::get('profileleave', ['as' => 'profileleave', 'uses' => 'UserSiteController@save_activity']);

Route::POST('postverify', ['as' => 'postverify', 'uses' => 'UserSiteController@postid']);

Route::POST('poststage', ['as' => 'poststage', 'uses' => 'UserSiteController@poststage']);


Route::get('registration_two', ['as' => 'registration_two', 'uses' => 'UserSiteController@step_two']);

Route::get('registration_three', ['as' => 'registration_three', 'uses' => 'UserSiteController@step_three']);

Route::get('suggestion_friends', ['as' => 'suggestion_friends', 'uses' => 'UserSiteController@suggestionfriends']);

Route::get('getcities', ['as' => 'getcities', 'uses' => 'UserSiteController@getcities']);


Route::POST('updateusertwo', ['as' => 'updatetwo', 'uses' => 'UserSiteController@updateusertwo']);

Route::POST('updateuserthree', ['as' => 'updatethree', 'uses' => 'UserSiteController@updateuserthree']);

//Route::prefix('profile')->group(function() {
//    Route::get('/', 'UserSiteController@index');
////    Route::get('', ['as' => 'index', 'uses' => 'UserSiteController@index']);
//
//});
//
