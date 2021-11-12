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

    public function follows()
    {
        return $this->hasOne('App\Follow');
    }

    public function followers()
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

    public function message()
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


    public function createUser($email){
        $user = new self();
        $user->email = $email;
        $user->token = Str::random(50);
        $user->save();
    }

    public function register($name,$password){
        $user = session()->get('register_user');
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->token = null;
        $user->save();
    }

    public function createProfile($cover,$image,$name,$profile,$twitter,$instagram,$facebook,$youtube){
        // ログインしているユーザーのレコード取得
        $user = Auth::user(); 
        // 各カラムに入力
        $user->cover = $cover;
        $user->image = $image;
        $user->name = $name;
        $user->profile = $profile;
        $user->twitter = $twitter;
        $user->instagram = $instagram;
        $user->facebook = $facebook;
        $user->youtube = $youtube;
        $user->save();
    }

    public function getProfile($id){
        $user = $this->find($id);
        return $user;
    }

    
}
