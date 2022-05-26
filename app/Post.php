<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function favorites()
    {
        return $this->hasMany('App\Favorite');
    }

//---------------------------TOPの投稿------------------------------//
    public function topGetCamps(){
        return $this->where('category','CAMP')
                    ->orderBy('id','desc')
                    ->select('id','photo')
                    ->take(6)
                    ->get();
    }
    public function topGetFoods(){
        return $this->where('category','FOOD')
                    ->orderBy('id','desc')
                    ->select('id','photo')
                    ->take(6)
                    ->get();
    }
    public function topGetgears(){
        return $this->where('category','GEAR')
                    ->orderBy('id','desc')
                    ->select('id','photo')
                    ->take(6)
                    ->get();
    }
//------------------------------------------------------------------//  

    public function sendPost($files,$category,$kind_1,$kind_2,$title,$content){
        $post = new self();
        $post->user_id = Auth::id();
        $post->category = $category;
        $post->kind_1 = $kind_1;
        $post->kind_2 = $kind_2;
        $post->title = $title;
        $post->content = $content;

        foreach ($files as $photos){
            $photo = $photos['photo']->store('public/post_photo');
            $photo = str_replace('public','/storage',$photo);

            if ($photo === array_key_first($files)){
                // １周目の処理
                $post->photo ="$photo,";
            }else{
                // ２周目以降
                // 文字列の結合 コンマに注意
                $post->photo .= "$photo,";
            }
        }
        
        $post->save();

        return $post->id;
        // 投稿を作ったタイミングでそのIDを取得⇨パラメーターとして送る
    }

//---------------------------------- 投稿一覧 ---------------------------------//
    public function getCamp(){
        return $this->where('category','CAMP')->select('id','photo')->get();
    }

    public function getFood(){
        return $this->where('category','FOOD')->select('id','photo')->get();
    }

    public function getGear(){
        return $this->where('category','GEAR')->select('id','photo')->get();
    }
//--------------------------------------------------------------------------------// 

    public function getPost(){
        $i = Auth::user()->follow()->value('follow_ids');
        $follow_ids = explode("," ,$i);
        foreach($follow_ids as $follow_id){
            if($post = $this->where('user_id', $follow_id)->first()){
                return $post;
            }
        }
    }
}
