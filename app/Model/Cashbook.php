<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cashbook extends Model
{
	public $timestamps = false;
    protected $table='cashbook';

    public function paymentMode()
    {
    	return $this->hasOne('App\Model\PaymentMode','id','payment_mode_id');
    }
}
