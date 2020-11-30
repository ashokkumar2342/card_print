<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public $timestamps = false;

	public function Roles()
	{
		return $this->hasOne('App\Model\UserRole','id','role_id'); 
	}
	public function Users()
	{
		return $this->hasOne('App\Model\User','id','created_by'); 
	}
}
