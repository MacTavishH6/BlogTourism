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

Route::get('/', 'GuestController@index')->name('guest');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/blog','HomeController@blog')->name('blog');
Route::get('/profile','HomeController@profile')->name('profile');
Route::get('/home/category{id}', 'GuestController@category')->name('guestsearch');
Route::get('/welcome', 'HomeController@welcome')->name('welcome');
Route::get('/user', 'HomeController@user')->name('viewuser');
Route::get('/about', 'GuestController@about')->name('about');

Route::post('/updateprofile','ProfileController@updateprofile')->name('updateprofile');

Route::get('/createblog','BlogController@createblog')->name('createblog');
Route::get('/detailblog{id}', 'GuestController@detailblog')->name('detailblog');
Route::delete('/deleteblog{id}', 'BlogController@deleteblog')->name('deleteblog');
Route::post('/saveblog','BlogController@saveblog')->name('saveblog');

Route::get('/logout', 'LogoutController@logout');
