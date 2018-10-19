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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
//Route::resource('posts', 'PostsController');
Route::get('/posts/{id}', 'PostsController@show')->name('posts.show'); // 특정 글
Route::get('/write', 'PostsController@create')->name('posts.create'); // 생성폼
Route::post('/posts', 'PostsController@store')->name('posts.store'); // 생성
Route::post('/posts/{id}', 'PostsController@update')->name('posts.update'); // 글 수정
Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.destory'); // 글 삭제

Route::get('/test/{id}', function ($id) {
  return response()->json($id);
});