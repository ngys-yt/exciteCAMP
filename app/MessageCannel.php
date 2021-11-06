<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageCannel extends Model
{
    public function messages()
    {
        return $this->hasMany('App\Message','channel_id');
    }

    public function user()
    {
        return $this->belongsTo('App/User');
    }

}
