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

Route::view('/', 'auth.welcome')->name('welcome');

// 会員登録
Route::view('/register_contact','auth.register_contact')->name('register_contact');
Route::view('/emails_complete','auth.emails_complete')->name('emails_complete');
Route::post('/register_contact', 'AuthController@contact');
Route::view('/register','auth.register')->name('register');
Route::post('/register', 'AuthController@register');
Route::get('/register/verify/{token}', 'AuthController@verifyToken')->name('verify');
Route::view('/register/main','auth.register_main')->name('register_main');
Route::post('/register/main', 'AuthController@registerMain');

// ログイン
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', 'AuthController@login');

// 認証済み
Route::group(['middleware' => ['auth']], function () {

    // トップページ
    Route::get('/top', 'exciteCampController@top')->name('top');

    // プロフィール
    Route::get('/mypage', 'exciteCampController@mypage')->name('mypage');
    Route::post('/create/profile', 'exciteCampController@createProfile')->name('create_profile');
    Route::view('/create/profile', 'profile.create_profile');
    Route::post('/profile/detail', 'exciteCampController@sendProfile')->name('send_profile');
    Route::get('/profile/{id}/detail', 'exciteCampController@profileDetail')->name('profile_detail');
    Route::view('/contact', 'profile.contact')->name('contact');
    Route::view('/edit_password', 'profile.edit_password')->name('edit_password');
    Route::view('/withdrawal', 'profile.withdrawal')->name('withdrawal');

    // フォロー
    Route::post('/post/follow', 'exciteCampController@follow')->name('follow');
    Route::get('/profile/{id}/ff_list', 'exciteCampController@ffList')->name('ff_list');

    // DM
    Route::get('profile/direct_message', 'exciteCampController@directMessage')->name('direct_message');
    Route::post('profile/message_content', 'exciteCampController@messageContent')->name('message_content');
    Route::post('profile/{id}/get_message', 'exciteCampController@getMessage')->name('get_message');
    Route::post('profile/send_message', 'exciteCampController@sendMessage')->name('send_message');
    

    // 投稿カテゴリー選択
    

    // 投稿作成〜投稿詳細
    Route::get('/create/post', 'exciteCampController@createPost')->name('create_post');
    Route::post('/create/post', 'exciteCampController@sendPost');
    Route::get('/post/{id}/detail', 'exciteCampController@postDetail')->name('post_detail');
    Route::view('/category', 'post.category')->name('category');
    Route::view('/category/map', 'post.map')->name('map');
    Route::view('/category/gear', 'post.gear')->name('gear');
    Route::view('/category/cook', 'post.cook')->name('cook');

    // いいね
    Route::post('/post/like', 'exciteCampController@like')->name('like');


    // カテゴリー別投稿一覧
    Route::get('/camp/list', 'exciteCampController@campList')->name('camp_list');
    Route::get('/food/list', 'exciteCampController@foodList')->name('food_list');
    Route::get('/gear/list', 'exciteCampController@gearList')->name('gear_list');

    // 通知
    Route::view('/notice', 'notice')->name('notice');

    // ログアウト
    Route::get('/logout', 'AuthController@logout')->name('logout');


});

