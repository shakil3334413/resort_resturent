<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function stock(){
    	return $this->hasMany('App\Model\Item','item_id','id');
    }
}
