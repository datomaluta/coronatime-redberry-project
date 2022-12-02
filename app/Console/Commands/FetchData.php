<?php

namespace App\Console\Commands;

use App\Models\Country;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchData extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'fetch:data';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'get covid data from api';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
		$countries = Http::get('https://devtest.ge/countries')->json();
		foreach ($countries as $country)
		{
			$stats = Http::post('https://devtest.ge/get-country-statistics', [
				'code' => $country['code'],
			])->json();

			Country::updateOrCreate(
				['id'=>$stats['id']],
				[
					'code'     => $country['code'],
					'name'     => [
						'en'=> strtolower($country['name']['en']),
						'ka'=> $country['name']['ka'],
					],
					'confirmed'=> $stats['confirmed'],
					'recovered'=> $stats['recovered'],
					'deaths'   => $stats['deaths'],
				]
			);
		}

		$this->info('Data fetched successfully');
	}
}
