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
        
        foreach ($files as $index=>$photo){
            // 画像保存
            $photo_path = $photo['photo']->store('public/post_photo');
            $photo_path = str_replace('public','/storage',$photo_path);
            
            // １周目の処理
            if ($index === array_key_first($files)){
                $post->photo = "$photo_path";
            }else{
                // ２周目以降の処理
                // 文字列の結合
                $post->photo .= ",$photo_path";
            }
        }

        $post->save();
        
        // 投稿を作ったタイミングでそのIDを取得⇨パラメーターとして送る
        return $post->id;
    }

    public function sendCampPost($files,$category,$kind_1,$kind_2,$title,$content,$latlng){
        $post = new self();
        $post->user_id = Auth::id();
        $post->category = $category;
        $post->kind_1 = $kind_1;
        $post->kind_2 = $kind_2;
        $post->title = $title;
        $post->content = $content;
        $post->location = $latlng;
        
        foreach ($files as $index=>$photo){
            // 画像保存
            $photo_path = $photo['photo']->store('public/post_photo');
            $photo_path = str_replace('public','/storage',$photo_path);
            
            // １周目の処理
            if ($index === array_key_first($files)){
                $post->photo = "$photo_path";
            }else{
                // ２周目以降の処理
                // 文字列の結合
                $post->photo .= ",$photo_path";
            }
        }

        $post->save();
        
        // 投稿を作ったタイミングでそのIDを取得⇨パラメーターとして送る
        return $post->id;
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
