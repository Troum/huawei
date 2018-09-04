<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Participant extends Model
{
	use Sluggable;

	protected $dates = [
		'created_at', 'updated_at'
	];

	protected $fillable = [
		'name','phone','email','address','imei', 'photo'
	];
	/**
	 * Return the sluggable configuration array for this model.
	 *
	 * @return array
	 */
	public function sluggable()
	{
		return [
			'directory' => [
				'source' => 'name'
			]
		];
	}

}
