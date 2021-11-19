<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    /**
     * User routes
     */
    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');
    Route::post('register', 'App\Http\Controllers\AuthController@register');
    /**
     * Post routes
     */
    Route::get('/posts','App\Http\Controllers\PostController@index');
    Route::post('/posts/create','App\Http\Controllers\PostController@store');
    Route::put('/posts/update/{id}','App\Http\Controllers\PostController@update');
    Route::delete('/posts/delete/{id}','App\Http\Controllers\PostController@destroy');
    Route::post('/posts/myposts/{id}', 'App\Http\Controllers\PostController@myPosts');
    Route::post('/posts/search', 'App\Http\Controllers\PostController@search');
    /**
     * Comments routes
     */
    Route::get('/comments','App\Http\Controllers\CommentController@index');
    Route::post('/comments/create','App\Http\Controllers\CommentController@store');
    Route::put('/comments/update/{id}','App\Http\Controllers\CommentController@update');
    Route::delete('/comments/delete/{id}','App\Http\Controllers\CommentController@destroy');
    Route::post('/comments/postcomments/{id}', 'App\Http\Controllers\CommentController@postComments');
});
