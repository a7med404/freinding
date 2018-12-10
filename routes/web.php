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

use Illuminate\Filesystem\Filesystem;

$admin_panel = 'admin';
//$admin_panel = DB::table('options')->where('option_key', 'admin_url')->value('option_value');
//if ($admin_panel == '' || $admin_panel == NULL) {
//    $admin_panel = 'admin';
//}
$site_open =1;// DB::table('options')->where('option_key', 'site_open')->value('option_value');
if ($site_open == 0 || $site_open == "0") {
// Close
    Route::get('close', ['as' => 'close', 'uses' => 'Site\SiteController@close']);
}
Route::group([
    'namespace' => 'Site',
        ], function () {
// Pages
    Route::get('', ['as' => 'home', 'uses' => 'HomeController@home']);
});
//step register
Route::get('register/second', ['as' => 'register.second', 'uses' => 'Auth\RegisterController@secondregister']);
//ajax
if (Request::ajax()){
    require __DIR__ . '/ajax_site.php';
}
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
    Route::get('statisticsregisters', ['as' => 'statisticsregisters', 'uses' => 'StatisticsReportController@statisticsregisters']);
    Route::get('statisticsusers', ['as' => 'statisticsusers', 'uses' => 'StatisticsReportController@statisticsUsers']);
    Route::get('statisticslifetime', ['as' => 'statisticslifetime', 'uses' => 'StatisticsReportController@statisticslifetime']);
    Route::get('statisticsagegender', ['as' => 'statisticsagegender', 'uses' => 'StatisticsReportController@statistics_ageGender']);
    Route::get('statisticspublic', ['as' => 'statisticspublic', 'uses' => 'StatisticsReportController@statisticsPublic']);
   
    Route::get('test', ['as' => 'test', 'uses' => 'StatisticsReportController@test']);

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

    //Role
    Route::get('roles/search', ['as' => 'roles.search', 'uses' => 'RoleController@search']);

    //Resource
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
});

Route::get('/storage-link', function () {
    $exitCode = \Artisan::call('storage:link');
    return $exitCode;
});

Route::get('/clear-dir-storage/{dir}',function ($dir){
    $time = Carbon\Carbon::now()->timestamp;
    $minut=1*60;
    $oneago=$time-$minut;
    $files = Storage::allFiles($dir);
    foreach ( $files as $file){
        if(Storage::lastModified($file)<$oneago){
            Storage::delete($file);
        }
    }
});