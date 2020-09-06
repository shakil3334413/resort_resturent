<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function roomtype()
    {
        return $this->belongsTo('App\Model\RoomType','roomtype_id','id');
    }
}
