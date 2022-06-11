<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail

{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function follow()
    {
        return $this->hasOne('App\Follow');
    }

    public function follower()
    {
        return $this->hasOne('App\Follower');
    }
    
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
    
    public function like()
    {
        return $this->hasOne('App\Like');
    }

    public function notices()
    {
        return $this->hasMany('App\Notices');
    }

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact');
    }

    public function message_channels()
    {
        return $this->hasMany('App\MessageChannel');
    }

    public function createUser($email,$name){
        $user = new self();
        $user->name = $name;
        $user->email = $email;
        $user->token = Str::random(50);
        $user->save();

        return $user->token;
    }

    public function register($password){
        $user = session()->get('register_user');
        $user->password = Hash::make($password);
        $user->token = null;
        $user->save();
    }

    //-----------------------------------プロフィール編集-------------------------------------// 
    public function createProfile($cover,$image,$name,$region,$profile,$twitter,$instagram,$facebook,$youtube){

        // ログインしているユーザーのレコード取得
        $user = Auth::user(); 
        // storeメソッド⇨保存先指定
        // cover保存
        if(isset($cover)){
            $cover = $cover->store('public/profile_cover');
            $cover = str_replace('public','/storage',$cover);  // $cover内 の /public を /storage に置換
            $user->cover = $cover; // DB上書き
        }else{
            // coverがnullで来たとき
            // DBに画像があれば処理なし。なければNULLを保存。
            if(isset($user->cover)){
                ;
            }else{
                $user->cover = NULL;
            }
        }
        // image保存
        if(isset($image)){
            $image = $image->store('public/profile_image');
            $image = str_replace('public','/storage',$image);  // $image の /public を /storage に置換
            $user->image = $image; // DB上書き
        }else{
            // imageがnullで来たとき 
            // DBに画像があれば処理なし。なければNULLを保存。
            if(isset($user->image)){
                ;
            }else{
                $user->image = NULL;
            }
        }
        
        // 各カラムに入力
        $user->name = $name;
        $user->region = $region;
        $user->profile = $profile;
        $user->twitter = $twitter;
        $user->instagram = $instagram;
        $user->facebook = $facebook;
        $user->youtube = $youtube;
        $user->save();
    }
    //------------------------------------------------------------------------------------------// 

    public function getProfile($id){
        $user = $this->find($id);
        return $user;
    }
    
}
