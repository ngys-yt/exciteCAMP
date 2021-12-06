<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function message_channels()
    {
        return $this->belongsTo('App\MessageChannel','id','channel_id')->orderBy('created_at', 'asc');
    }

    public function setMessage($message_content,$channel_id){
        $message = new self();
        $message->user_id = Auth::id();
        $message->content = $message_content;
        $message->channel_id = $channel_id;
        $message->save();
    }
}
