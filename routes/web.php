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

Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/trending', 'HomeController@index')->middleware('verified')->name('trending');
Route::get('/recent', 'HomeController@recentIndex')->middleware('verified')->name('recent');
Route::get('/tags', 'HomeController@tagsIndex')->middleware('verified')->name('tags');
Route::get('/tags/{tag}', 'HomeController@tagsShow')->middleware('verified');

//Route::resource('posts', 'PostsController');
Route::get('/posts/{id}', 'PostsController@show')->name('posts.show'); // 특정 글
Route::get('/write', 'PostsController@create')->name('posts.create'); // 생성폼
Route::post('/posts', 'PostsController@store')->name('posts.store'); // 생성
Route::post('/posts/{id}', 'PostsController@update')->name('posts.update'); // 글 수정
Route::get('/posts/{id}/delete', 'PostsController@destroy')->name('posts.destory'); // 글 삭제

Route::post('/comment/write', 'CommentController@write');
Route::get('/comment/list', 'CommentController@listComments');

Route::post('/imgUpload', 'PostsController@imgUpload');

Route::get('login/google', 'GoogleController@redirectToProvider');
Route::get('login/google/callback', 'GoogleController@handleProviderCallback');