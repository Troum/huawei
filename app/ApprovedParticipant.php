<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ApprovedParticipant extends Model
{
	use Sluggable;

	protected $dates = [
		'created_at', 'updated_at'
	];

	protected $fillable = [
		'name','phone','email','address','imei','number', 'photo', 'moderator'
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
