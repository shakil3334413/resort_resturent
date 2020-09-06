<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public function subcategory(){
    	return $this->hasOne('App\Model\SubCategory','category_id','id');
    }
    public function stock(){
    	return $this->hasMany('App\Model\Stock','category_id','id');
    }
}
