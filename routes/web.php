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
Route::view('/register_contact','auth.register_contact')->name('register_contact');
Route::post('/register_contact', 'AuthController@contact');
Route::view('/register','auth.register')->name('register');
Route::post('/register', 'AuthController@register');
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
    Route::get('/top', 'exciteCampController@top')->name('top');

    // プロフィール
    Route::view('/mypage', 'profile.mypage')->name('mypage');
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
    // Route::get('profile/name_seach', 'exciteCampController@nameSeach')->name('name_seach');
    // Route::post('profile/new_message_content', 'exciteCampController@newMessageContent')->name('new_message_content');
    // Route::post('profile/new_send_message', 'exciteCampController@newSendMessage')->name('new_send_message');
    // Route::get('profile/extract_user', 'exciteCampController@extractUser')->name('extract_user');




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


    // カテゴリー別投稿一覧
    Route::get('/camp/list', 'exciteCampController@campList')->name('camp_list');
    Route::get('/food/list', 'exciteCampController@foodList')->name('food_list');
    Route::get('/gear/list', 'exciteCampController@gearList')->name('gear_list');

    // 通知
    Route::view('/notice', 'notice')->name('notice');

    // ログアウト
    Route::get('/logout', 'AuthController@logout')->name('logout');


});

