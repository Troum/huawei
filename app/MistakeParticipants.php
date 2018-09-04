<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MistakeParticipants extends Model
{
	protected $dates = [
		'created_at', 'updated_at'
	];

	protected $fillable = [
		'name','phone','email','address','imei_one','imei_two', 'photo', 'directory', 'error', 'moderator'
	];
}
