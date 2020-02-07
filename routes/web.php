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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/profile', 'TweetController@show');

Route::get('/showUser', 'TweetController@showUser');

Route::get('/home', 'HomeController@index')->name('loginPage');

Route::get('/showTweets', 'TweetController@showTweets');

//Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/loginPage', 'HomeController@index')->name('home');
