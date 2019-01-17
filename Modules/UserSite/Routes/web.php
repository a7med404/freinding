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

use App\Notifications\NewFriendNotification;
use App\User;

Route::group([
    'prefix' => 'profile',
    'as' => 'profile.',
    'middleware' => ['auth']
], function () {
    Route::get('setting', ['as' => 'setting', 'uses' => 'UserSiteController@profileSetting']);
    Route::get('changepassword', ['as' => 'changepassword', 'uses' => 'UserSiteController@changepasswordSetting']);
    Route::post('setting', ['as' => 'setting.store', 'uses' => 'UserSiteController@storeSetting']);

    Route::get('account', ['as' => 'countsetting', 'uses' => 'UserSiteController@countSetting']);
    Route::post('account', ['as' => 'countsetting.store', 'uses' => 'UserSiteController@storeCount']);
    Route::get('statistics', ['as' => 'statistics', 'uses' => 'UserSiteController@statistics']);

    Route::get('verification', ['as' => 'verification', 'uses' => 'UserSiteController@getverify']);

    Route::get('stage', ['as' => 'stage', 'uses' => 'UserSiteController@getstage']);
    Route::get('/@{username?}', ['as' => 'index', 'uses' => 'UserSiteController@index']);
    Route::post('/{action}/{id}', 'UserSiteController@friendAction')->name('friend-action');
    Route::get('/@{username?}/friends','UserSiteController@friends')->name('friends');
    Route::get('/@{username?}/followers','UserSiteController@followers')->name('followers');
    Route::get('/@{username?}/following','UserSiteController@following')->name('following');

});
//route for track session
Route::get('profileleave', ['as' => 'profileleave', 'uses' => 'UserSiteController@save_activity']);

Route::POST('postverify', ['as' => 'postverify', 'uses' => 'UserSiteController@postid']);

Route::POST('poststage', ['as' => 'poststage', 'uses' => 'UserSiteController@poststage']);


Route::get('registration-two', ['as' => 'registration-two', 'uses' => 'UserSiteController@step_two']);

Route::get('registration-three', ['as' => 'registration-three', 'uses' => 'UserSiteController@step_three']);

Route::get('suggestion-friends', ['as' => 'suggestion-friends', 'uses' => 'UserSiteController@suggestionFriends']);
Route::post('suggestion-friends', ['as' => 'suggestion-friends', 'uses' => 'UserSiteController@saveSuggestionFriends']);

Route::get('cities-autocomplete', ['as' => 'cities-autocomplete', 'uses' => 'UserSiteController@citiesAutocomplete']);


Route::POST('update-user-image', ['as' => 'update-user-image', 'uses' => 'UserSiteController@updateUserImage']);

Route::POST('update-user-two', ['as' => 'update-user-two', 'uses' => 'UserSiteController@updateUserTwo']);

Route::POST('update-user-three', ['as' => 'update-user-three', 'uses' => 'UserSiteController@updateUserThree']);


Route::get('read-notifications/{id?}','UserSiteController@readNotification')->name('read-notifications');
//Route::prefix('profile')->group(function() {
//    Route::get('/', 'UserSiteController@index');
////    Route::get('', ['as' => 'index', 'uses' => 'UserSiteController@index']);
//
//});
//
Route::get('/pusher', function() {
//    $id=3;
//    $resp=\Auth::user()->addFriend($id);
//    User::find($id)->notify(new NewFriendNotification(\Auth::user()));
//    return $resp;
    event(new App\Events\FriendShipEvent(1004));
    return "Event has been sent!";
});
