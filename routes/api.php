<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('get_users','UsersController@getUsers');
});

Route::prefix('comments')->group(function () {
    Route::get('get_comments','commentsController@getcomments');
});

Route::prefix('posts')->group(function () {
    Route::get('get_posts','PostsController@getPosts');
    Route::post('insert_posts','PostsController@insertPost');
});

