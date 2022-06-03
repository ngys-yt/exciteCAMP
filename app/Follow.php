<?php

namespace App;

use Facades\App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function followToggle($user_id){
        // followsにユーザーID(自分)があるか
        if($i = $this->where('user_id',Auth::id())->first()){
            // follow_idsの中に,user_id,が含まれているか
            if(strpos($i->follow_ids, ",$user_id,") === false){
                $i->follow_ids .= "$user_id,"; // 文字列の結合 コンマに注意
                $i->save();
            }else{
                // ,$user_id,を , に置き換える
                $i->follow_ids = str_replace(",$user_id,", "," , $i->follow_ids);
                $i->save();
            }
        }else{
            $i = new self();
            $i->user_id = Auth::id();
            $i->follow_ids = ",$user_id,";
            $i->save();
        }
    }

    public function getFollowIds($id){
        $follow_ids = [];
        // followsにユーザー($id)があるか そのままfollow_ids取得
        if($i = $this->where('user_id',$id)->value('follow_ids')){
            // '$i'はカンマ区切りの文字列のため配列にする(explode)
            $follow_ids = explode("," ,$i);
            // $follow_idsは配列
            $follow_users = User::whereIn('id',$follow_ids)->get();
        }else{
            $follow_users = User::whereIn('id',$follow_ids)->get();
        }

        return $follow_users;
    }

    public function getFollowerIds($id){
        // followsからuser_idとfollow_idsを全て取得(配列)
        $i = $this->pluck('follow_ids','user_id');
        $follower_ids = [];
        foreach($i as $user_id => $follow_ids){
            if(strpos($follow_ids, ",$id,") === false){
                ;   // $follow_idsに$idが含まれない場合何も処理を実行しない
            }else{
                array_push($follower_ids,$user_id);
            }
        }
        $follower_users = User::whereIn('id',$follower_ids)->get();

        return $follower_users;
    }
}