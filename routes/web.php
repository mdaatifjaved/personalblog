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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home'); //code for HomeController

Route::get('/post', 'PostController@post')->middleware('auth'); //code for viewing post

Route::get('/profile', 'ProfileController@profile')->middleware('auth'); //code for profile view

Route::get('/category', 'CategoryController@category')->middleware('auth'); //code for category view

Route::post('/addCategory', 'CategoryController@addCategory')->middleware('auth'); //code for adding category

Route::post('/addProfile', 'ProfileController@addProfile')->middleware('auth'); //Code for adding profile_pic

Route::post('/addPost', 'PostController@addPost')->middleware('auth'); //Code for adding post

Route::get('/view/{id}', 'PostController@view')->middleware('auth'); //code for viewing post full

Route::get('/edit/{id}', 'PostController@edit')->middleware('auth'); //code to view post to edit

Route::post('/editPost/{id}', 'PostController@editPost')->middleware('auth'); //code for editing post

Route::get('/delete/{id}', 'PostController@deletePost')->middleware('auth'); //code for deleting post

Route::get('/category/{id}', 'PostController@category')->middleware('auth'); //Code for getting specific category post

Route::get('/like/{id}', 'PostController@like')->middleware('auth'); //code for liking a post

Route::get('/dislike/{id}', 'PostController@dislike')->middleware('auth'); //code for disliking a post

Route::post('/comments/{id}', 'PostController@comments')->middleware('auth'); // code for commenting on a post

Route::post('/search', 'PostController@search')->middleware('auth'); //code for searching a post on site
