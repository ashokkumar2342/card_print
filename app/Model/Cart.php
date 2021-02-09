<?php

namespace App\Model;

use App\Model\ItemList;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
     protected $table='cart';
     protected $guard=[];
     public $timestamps=false; 
     
     public function items()
     { 
     	return $this->hasOne('App\Model\ItemList','id','item_id');
     }
     
}
