<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeclinedParticipants extends Model
{
	protected $dates = [
		'created_at', 'updated_at'
	];

	protected $fillable = [
		'name','phone','email','address','imei', 'photo', 'directory', 'moderator'
	];
}
