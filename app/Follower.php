<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    // public function followerToggle($user_id){
    //     // followersにユーザーID(自分)があるか
    //     if($i = $this->where('user_id',Auth::id())->first()){
    //         // follower_idsの中に,user_id,が含まれているか
    //         if(strpos($i->follower_ids, ",$user_id,") === false){
    //             $i->follower_ids .= "$user_id,"; // 文字列の結合 コンマに注意
    //             $i->save();
    //         }else{
    //             // ,$user_id,を , に置き換える
    //             $i->follow_ids = str_replace(",$user_id,", "," , $i->follow_ids);
    //             $i->save();
    //         }
    //     }else{
    //         $i = new self();
    //         $i->user_id = Auth::id();
    //         $i->follow_ids = ",$user_id,";
    //         $i->save();
    //     }
    // }
}
