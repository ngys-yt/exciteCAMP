<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function message_channel()
    {
        return $this->belongsTo('App\MessageChannel','id','channel_id');
    }
}
