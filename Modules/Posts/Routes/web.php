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

Route::prefix('posts')->group(function() {
    Route::get('/', 'PostsController@index');
    Route::post('/react', 'PostsController@react')->name('react');
    Route::post('/users-reactions', 'PostsController@usersReactions')->name('users-reactions');
    Route::post('/new-comment', 'PostsController@newComment')->name('new-comment');
    Route::post('/delete-post', 'PostsController@deletePost')->name('delete-post');
	Route::post('/comment-delete', 'PostsController@commentDelete')->name('comment-delete');
	Route::post('/new-post', 'PostsController@newPost')->name('new-post');
	Route::post('/post-photo-temp', 'PostsController@storePostsPhotosInTemp')->name('storePostsPhotosInTemp');
	Route::post('/delete-from-temp', 'PostsController@deleteFromTemp')->name('deleteFromTemp');
    Route::post('/share-post', 'PostsController@sharePost')->name('share-post');

});
