<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
	
    protected $fillable=['d_id'];

    public function Distributer()
    {
    	return $this->hasOne('App\Model\User','id','distributer_id');	
    }
}
