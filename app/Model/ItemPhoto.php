<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemPhoto extends Model
{
	public $timestamps = false; 
    protected $fillable=['id','user_id'];

    public function Items()
     {
     	return $this->hasOne('App\Model\ItemList','id','item_id');
     } 
}
