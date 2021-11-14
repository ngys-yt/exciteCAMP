<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{

    public function likeToggle($post_id){
        // LikeにユーザーID(自分)があるか
        if($i = $this->where('user_id',Auth::id())->first()){
            // post_idsの中に,post_id,が含まれているか
            if(strpos($i->post_ids, ",$post_id,") === false){
                $i->post_ids .= "$post_id,"; // 文字列の結合 コンマに注意
                $i->save();

                return 'on';

            }else{
                // ,$post_id,を , に置き換える
                $i->post_ids = str_replace(",$post_id,", "," , $i->post_ids);
                $i->save();

                return 'off';
            }

        }else{
            $i = new self();
            $i->user_id = Auth::id();
            $i->post_ids = ",$post_id,";
            $i->save();

            return 'on';
        }
    }
}
