<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
	use HasFactory;

	use HasTranslations;

	protected $fillable = [
		'code',
		'name',
		'confirmed',
		'recovered',
		'deaths',
	];

	public $translatable = ['name'];

	protected $casts = [
		'name' => 'array',
	];
}
