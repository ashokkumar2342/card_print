<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class FeedbackUser extends Model
{
	
    protected $table='feedback_user';
    protected $fillable=['user_id','service_type'];
    public $timestamps=false;
}
