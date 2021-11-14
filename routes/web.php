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

Route::view('/', 'welcome')->name('welcome');

// 会員登録
Route::view('/register','auth.register')->name('register');
Route::post('/register', 'AuthController@register');
Route::view('/register/sent','auth.register_sent')->name('register_sent');
Route::get('/register/verify/{token}', 'AuthController@verifyToken');
Route::view('/register/main','auth.register_main')->name('register_main');
Route::post('/register/main', 'AuthController@registerMain');
Route::view('/register/complete','auth.register_complete')->name('register_complete');

// ログイン
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', 'AuthController@login');

// 認証済み
Route::group(['middleware' => ['auth']], function () {

    // トップページ
    Route::view('/top', 'top')->name('top');

    // プロフィール
    Route::view('/mypage', 'profile.mypage')->name('mypage');
    Route::post('/create/profile', 'exciteCampController@createProfile')->name('create_profile');
    Route::view('/create/profile', 'profile.create_profile');
    Route::post('/profile/detail', 'exciteCampController@sendProfile')->name('send_profile');
    Route::get('/profile/{id}/detail', 'exciteCampController@profileDetail')->name('profile_detail');
    Route::view('/direct_message', 'profile.direct_message')->name('direct_message');
    Route::view('/follow_list', 'profile.ff_list')->name('follow_list');
    Route::view('/follower_list', 'profile.ff_list')->name('follower_list');
    Route::view('/contact', 'profile.contact')->name('contact');
    Route::view('/edit_password', 'profile.edit_password')->name('edit_password');
    Route::view('/withdrawal', 'profile.withdrawal')->name('withdrawal');


    // 投稿カテゴリー選択
    Route::view('/category', 'category.category')->name('category');
    Route::view('/map', 'category.map')->name('map');
    Route::view('/gear', 'category.gear')->name('gear');
    Route::view('/cook', 'category.cook')->name('cook');

    // 投稿作成〜投稿詳細
    Route::get('/create/post', 'exciteCampController@createPost')->name('create_post');
    Route::post('/create/post', 'exciteCampController@sendPost');
    Route::get('/post/{id}/detail', 'exciteCampController@postDetail')->name('post_detail');

    // いいね
    Route::post('/post/like', 'exciteCampController@like')->name('like');
    Route::post('/post/follow', 'exciteCampController@follow')->name('follow');


    // カテゴリー別投稿一覧
    Route::get('/camp/list', 'exciteCampController@campList')->name('camp_list');
    Route::get('/food/list', 'exciteCampController@foodList')->name('food_list');
    Route::get('/gear/list', 'exciteCampController@gearList')->name('gear_list');

    // 通知
    Route::view('/notice', 'notice')->name('notice');

    // ログアウト
    Route::get('/logout', 'AuthController@logout')->name('logout');


});

