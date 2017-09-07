<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scrap extends Model
{
    
	protected $fillable = [
		'com_id','user_id','facebook_token','google_token','couverts','dinningcity','tripadvisor','seatme'
	];
}
