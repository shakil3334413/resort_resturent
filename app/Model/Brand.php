<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function stock(){
    	return $this->hasMany('App\Model\Stock','brand_id','id');
    }
}
