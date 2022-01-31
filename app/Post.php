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

    public function sendPost($photo,$category,$kind_1,$kind_2,$title,$content){
        $post = new self();
        $post->user_id = Auth::id();
        $post->photo = $photo;
        $post->category = $category;
        $post->kind_1 = $kind_1;
        $post->kind_2 = $kind_2;
        $post->title = $title;
        $post->content = $content;
        $post->save();

        return $post->id;
        // 投稿を作ったタイミングでそのIDを取得⇨パラメーターとして送る
    }

    public function getCamp(){
        return $this->where('category','CAMP')->select('id','photo')->get();
    }

    public function getFood(){
        return $this->where('category','FOOD')->select('id','photo')->get();
    }

    public function getGear(){
        return $this->where('category','GEAR')->select('id','photo')->get();
    }

    public function getPost(){
        $i = Auth::user()->follow()->value('follow_ids');
        $follow_ids = explode("," ,$i);
        foreach($follow_ids as $follow_id){
            if($post = $this->where('user_id', $follow_id)->first()){
                // dd($post);
                return $post;
            }
        }
    }
}
