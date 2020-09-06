<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Model\Category','category_id','id');
    }
    public function subcategory()
    {
        return $this->belongsTo('App\Model\SubCategory','subcategory_id','id');
    }
    public function brand()
    {
        return $this->belongsTo('App\Model\Brand','brand_id','id');
    }
    public function item()
    {
        return $this->belongsTo('App\Model\Item','item_id','id');
    }
}
