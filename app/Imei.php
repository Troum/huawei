<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imei extends Model
{
	protected $dates = [
		'created_at', 'updated_at'
	];

	protected $fillable = [
		'imei_one','imei_two', 'status'
	];
}
