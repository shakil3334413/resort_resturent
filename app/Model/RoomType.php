<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    public function room(){
    	return $this->hasOne('App\Model\Room','roomtype_id','id');
    }
}
