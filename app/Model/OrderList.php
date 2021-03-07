<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
	 
    protected $table='order_list';
    protected $fillable=['id','user_id'];
    public $timestamps = false;

     
}
