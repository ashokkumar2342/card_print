<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
	 
    protected $table='order_address';
    protected $fillable=['id','user_id'];
    public $timestamps = false;

     
}
