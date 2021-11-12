<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Like extends Model
{
    // public function createLike($post_id){
    //     if(Like::where('user_id', Auth::id())->exists()){
    //         $this->post_ids = 
    //     }        
    // }

    public function likeToggle($post_id){
        if($i = $this->where('user_id',Auth::id())->first()){
            if(strpos($i->post_ids,",$post_id,") === false){
                $i->post_ids .= "$post_id,";
                $i->save();

                return 'on';
            }else{
                $i->post_ids = str_replace(",$post_id,",",",$i->post_ids);
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
