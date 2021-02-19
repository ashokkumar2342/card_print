<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RechargeRequest extends Model
{
	public $timestamps = false;
    protected $table='recharge_request';

    public function RechargePackage()
    {
    	return $this->hasOne('App\Model\RechargePackage','id','package_id');
    }
}