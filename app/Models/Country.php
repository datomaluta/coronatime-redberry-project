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

	public function scopeFilter($query, array $filters)
	{
		$query->when($filters['search'] ?? false, function ($query, $search) {
			$query->where('name', 'like', '%' . strtolower($search) . '%')->get();
		});

		$query->when($filters['location'] ?? false, function ($query, $location) {
			if ($location == 'desc')
			{
				$query->orderby('name->' . app()->getLocale(), 'desc');
			}
			else
			{
				$query->orderby('name->' . app()->getLocale(), 'asc');
			}
		});

		$query->when($filters['confirmed'] ?? false, function ($query, $confirmed) {
			if ($confirmed == 'desc')
			{
				$query->orderby('confirmed', 'desc');
			}
			else
			{
				$query->orderby('confirmed', 'asc');
			}
		});

		$query->when($filters['deaths'] ?? false, function ($query, $deaths) {
			if ($deaths == 'desc')
			{
				$query->orderby('deaths', 'desc');
			}
			else
			{
				$query->orderby('deaths', 'asc');
			}
		});

		$query->when($filters['recovered'] ?? false, function ($query, $recovered) {
			if ($recovered == 'desc')
			{
				$query->orderby('recovered', 'desc');
			}
			else
			{
				$query->orderby('recovered', 'asc');
			}
		});
	}
}
