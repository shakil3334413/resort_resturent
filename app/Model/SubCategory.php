<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Model\Category','category_id','id');
    }

    public function stock(){
    	return $this->hasMany('App\Model\Stock','subcategory_id','id');
    }
}
