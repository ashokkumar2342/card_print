<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
	 
    protected $table='order_detail';
    protected $fillable=['id','user_id'];
    public $timestamps = false;

     
}
