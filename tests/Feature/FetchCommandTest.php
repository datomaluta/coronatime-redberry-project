<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class FetchCommandTest extends TestCase
{
	public function test_fetch_command()
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response([
				[
					'code'=> 'GE',
					'name'=> [
						'en'=> 'Georgia',
						'ka'=> 'საქართველო',
					],
				],
			], 200),

			'https://devtest.ge/get-country-statistics' => Http::response([
				'id'        => 29,
				'country'   => 'Georgia',
				'code'      => 'GE',
				'confirmed' => 2258,
				'recovered' => 2043,
				'critical'  => 2600,
				'deaths'    => 1579,
				'created_at'=> '2022-02-13T18=>17:01.000000Z',
				'updated_at'=> '2022-12-07T00:00:04.000000Z',
			], 200),
		]);
		$this->artisan('fetch:data')->assertSuccessful();
	}
}
