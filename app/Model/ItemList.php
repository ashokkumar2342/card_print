<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
	public $timestamps = false;
    protected $table='item_list';
    protected $fillable=['id','user_id']; 
}
