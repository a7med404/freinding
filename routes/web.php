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

//Route::get('/', function () {
//    return view('welcome');
//});

$admin_panel = 'admin';
//$admin_panel = DB::table('options')->where('option_key', 'admin_url')->value('option_value');
//if ($admin_panel == '' || $admin_panel == NULL) {
//    $admin_panel = 'admin';
//}

Route::group([
    'namespace' => 'Site',
        ], function () {
// Pages
    Route::get('', ['as' => 'home', 'uses' => 'HomeController@home']);
});

// Auth
Auth::routes();

// Auth Admin
Route::get($admin_panel . '/login', ['as' => 'admin.login', 'uses' => 'Auth\LoginAdminController@showLoginForm']);
Route::post($admin_panel . '/login', ['uses' => 'Auth\LoginAdminController@login']);
Route::post($admin_panel . 'logout', ['as' => 'admin.logout', 'uses' => 'Auth\LoginAdminController@logout']);

//Admin
Route::group([
    'prefix' => $admin_panel,
    'as' => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['admin']
        ], function () {


    //Statistics
    Route::get('', ['as' => 'index', 'uses' => 'StatisticsReportController@homeAdmin']);
    Route::get('statisticsorders', ['as' => 'statisticsorders', 'uses' => 'StatisticsReportController@statisticsOrders']);
    Route::get('statisticsusers', ['as' => 'statisticsusers', 'uses' => 'StatisticsReportController@statisticsUsers']);
    Route::get('statisticspublic', ['as' => 'statisticspublic', 'uses' => 'StatisticsReportController@statisticsPublic']);

    //User
    Route::get('users/{id}/type/{name}', ['as' => 'users.posttype', 'uses' => 'UserController@postType']);
    Route::get('users/{id}/comments', ['as' => 'users.comments', 'uses' => 'UserController@comments']);
    Route::get('users/search', ['as' => 'users.search', 'uses' => 'UserController@search']);
    Route::post('storePassword', ['as' => 'users.storePassword', 'uses' => 'UserController@storePassAdditional']);
    Route::patch('updatePassword/{id}', ['as' => 'users.updatePassword', 'uses' => 'UserController@updatePassword']);
    Route::post('storeAdditional', ['as' => 'users.storeAdditional', 'uses' => 'UserController@storePassAdditional']);
    Route::patch('updateAdditional/{id}', ['as' => 'users.updateAdditional', 'uses' => 'UserController@updateAdditional']);
    Route::post('storeHidden', ['as' => 'users.storeHidden', 'uses' => 'UserController@storePassAdditional']);
    Route::patch('updateHidden/{id}', ['as' => 'users.updateHidden', 'uses' => 'UserController@updateHidden']);
    Route::post('userstatus', ['as' => 'userstatus', 'uses' => 'AjaxController@userStatus']);

    //Role && Message
    Route::get('roles/search', ['as' => 'roles.search', 'uses' => 'RoleController@search']);
    Route::get('messages/search', ['as' => 'messages.search', 'uses' => 'MessageController@search']);

    //Resource
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
});

Route::get('/storage-link', function () {
    $exitCode = \Artisan::call('storage:link');
    return $exitCode;
});