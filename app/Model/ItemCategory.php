<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
	public $timestamps = false;
    protected $table='item_category';
    protected $fillable=['id','user_id']; 
}
