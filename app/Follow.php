<?php

namespace App;

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
}
