<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::resource('profiles', 'ProfilesController');
Route::get('/profiles/{id}/edit', 'ProfilesController@edit')->name('profiles.edit')->middleware('auth');
Route::get('/profiles/{id}', 'ProfilesController@show')->name('profiles.show')->middleware('auth');

Route::resource('posts', 'PostsController');
Route::get('/posts/create', 'PostsController@create')->name('posts.create')->middleware('auth');
Route::get('/posts/{id}', 'PostsController@show')->name('posts.show');
Route::get('/posts', 'PostsController@index')->name('posts.index')->middleware('auth');
Route::get('/posts/{id}/edit', 'PostsController@edit')->name('posts.edit')->middleware('auth');
Route::patch('/posts/{id}', 'PostsController@update')->name('posts.patch')->middleware('auth');
Route::delete('/posts/{id}', 'PostsController@destroy')->name('posts.delete')->middleware('auth');

Route::get('/drafts', 'DraftsController@index')->name('drafts.index')->middleware('auth');

Route::get('/allstories', 'StoriesController@allStories')->name('allstories');

Route::post('/allstories', 'StoriesController@allStories');

Route::resource('comments', 'CommentsController');
Route::post('comments/store/{id}', 'CommentsController@store');

Route::post('follow/{id}', 'FollowsController@store');
Route::get('/followers', 'FollowsController@followers')->name('follows.followers');
Route::get('/following', 'FollowsController@following')->name('follows.following');

Route::post('like/{id}', 'LikesController@store');

Route::get('/about', 'PagesController@about')->name('pages.about');
Route::get('/privacypolicy', 'PagesController@privacypolicy')->name('pages.privacypolicy');

Route::resource('contacts', 'ContactsController');
Route::get('/contacts/create', 'ContactsController@create')->name('contacts.create');
Route::post('/contacts', 'ContactsController@store')->name('contacts.store');



