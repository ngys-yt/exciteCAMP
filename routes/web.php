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

use Facades\App\User;
Route::view('/', 'welcome')->name('welcome');

Route::view('/register','auth.register')->name('register');
Route::post('/register', 'AuthController@register');
Route::view('/register/sent','auth.register_sent')->name('register_sent');
Route::post('/register/verify/{token}', 'AuthController@verifyToken');
Route::view('/register/main','auth.register_main')->name('register_main');
Route::post('/register/main', 'AuthController@registerMain');
Route::view('/register/complete','auth.register_complete')->name('register_complete');

Route::view('/login', 'auth.login')->name('login');
Route::post('/login', 'AuthController@login');


Route::group(['middleware' => ['auth']], function () {

    Route::view('/top', 'top')->name('top');

    Route::get('/profile/detail', 'exciteCampController@profileDetail')->name('profile_detail');
    Route::post('/create/profile', 'exciteCampController@createProfile')->name('create_profile');
    Route::view('/create/profile', 'profile.create_profile');

    Route::post('/profile/detail', 'exciteCampController@sendProfile')->name('send_profile');

    Route::view('/category', 'category.category')->name('category');
    Route::view('/map', 'category.map')->name('map');
    Route::view('/gear', 'category.gear')->name('gear');
    Route::view('/cook', 'category.cook')->name('cook');

    Route::get('/create/post', 'exciteCampController@createPost')->name('create_post');
    Route::post('/create/post', 'exciteCampController@sendPost');
    Route::get('/post/{id}/detail', 'exciteCampController@postDetail')->name('post_detail');


    


    Route::view('/camp/list', 'post.camp_list')->name('camp_list');
    Route::view('/cook/list', 'post.cook_list')->name('cook_list');
    Route::view('/gear/list', 'post.gear_list')->name('gear_list');


    Route::get('/logout', 'AuthController@logout')->name('logout');

});

