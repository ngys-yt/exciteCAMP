<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class MessageChannel extends Model
{    
    
    public function user()
    {
        return $this->belongsTo('App/User');
    }
    
    public function messages()
    {
        return $this->hasMany('App\Message','channel_id');
    }

    public function getChannels(){
        $channels = $this->where('user_id_1', Auth::id())
                        ->orWhere('user_id_2', Auth::id())
                        ->get();

        return $channels;
    }

    public function statusToggle($user_id){
        // ''user_id_1,2'にそれぞれ自分と相手のidが入っているレコードをfirstで取得
        $message_channel = $this->where([
                            ['user_id_1', Auth::id()],
                            ['user_id_2', $user_id]
                            ])->orWhere([
                                ['user_id_1', $user_id],
                                ['user_id_2', Auth::id()]
                            ])->first();
        // 'read_status'既読未読の切り替え
        if($message_channel->where('user_id_1', Auth::id())){
            if($message_channel->user_id_1_read_status == 0){
                $message_channel->user_id_1_read_status = 1;
                $message_channel->save();
            }else{
                ;
            }
        }elseif($message_channel->where('user_id_2', Auth::id())){
            if($message_channel->user_id_2_read_status == 0){
                $message_channel->user_id_2_read_status = 1;
                $message_channel->save();
            }else{
                ;
            }
        }
    }

    public function getMessages($user_id){
        $message_channel = $this->where([
                            ['user_id_1', Auth::id()],
                            ['user_id_2', $user_id]
                            ])->orWhere([
                                ['user_id_1', $user_id],
                                ['user_id_2', Auth::id()]
                            ])->first();
        $messages = $message_channel->messages; // モデル(message)にて昇順設定済み

        return $messages;
    }
}
