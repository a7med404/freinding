<?php

Route::post('add_register_first', ['as' => 'add_register_first', 'uses' => 'Auth\RegisterController@ajax_add_register_first']);
Route::post('add_register_second', ['as' => 'add_register_second', 'uses' => 'Auth\AjaxController@ajax_add_register_second']);
Route::post('add_register_three', ['as' => 'add_register_three', 'uses' => 'Auth\AjaxController@ajax_add_register_three']);
Route::post('add_register_four', ['as' => 'add_register_four', 'uses' => 'Auth\AjaxController@ajax_add_register_four']);

Route::group([
    'namespace' => 'Site',
        ], function () {
//page---->validation register
    Route::post('check_found_email', ['as' => 'check_found_email', 'uses' => 'AjaxController@check_found_email']);
//    Route::post('check_found_phone', ['as' => 'check_found_phone', 'uses' => 'AjaxController@check_found_phone']);
    Route::post('add_image_user', ['as' => 'add_image_user', 'uses' => 'AjaxController@add_image_user']);
    
    
});
