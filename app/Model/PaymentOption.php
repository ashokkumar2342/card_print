<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PaymentOption extends Model
{
	public $timestamps = false;
    protected $table='payment_option';

    public function paymentMode()
    {
    	return $this->hasOne('App\Model\PaymentMode','id','payment_mode_id');
    }
}
