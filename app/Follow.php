<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Follow extends Model
{
    public function followToggle($follow_id){
        // followsにユーザーID(自分)があるか
        if($i = $this->where('user_id',Auth::id())->first()){
            // follow_idsの中に,follow_id,が含まれているか
            if(strpos($i->follow_ids, ",$follow_id,") === false){
                $i->follow_ids .= "$follow_id,"; // 文字列の結合 コンマに注意
                $i->save();

                return 'on';

            }else{
                // ,$follow_id,を , に置き換える
                $i->follow_ids = str_replace(",$follow_id,", "," , $i->follow_ids);
                $i->save();

                return 'off';
            }

        }else{
            $i = new self();
            $i->user_id = Auth::id();
            $i->follow_ids = ",$follow_id,";
            $i->save();

            return 'on';
        }
    }
}
