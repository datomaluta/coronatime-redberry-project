<?php

namespace App\Http\Controllers;

use App\Models\Country;

class DashboardController extends Controller
{
	public function getWorldwide()
	{
		$data = [
			'confirmed'=> Country::all()->sum('confirmed'),
			'recovered'=> Country::all()->sum('recovered'),
			'deaths'   => Country::all()->sum('deaths'),
		];

		return view('dashboard.worldwide.index', ['data'=>$data]);
	}

	public function getByCountry()
	{
		$data = [
			'confirmed'=> Country::all()->sum('confirmed'),
			'recovered'=> Country::all()->sum('recovered'),
			'deaths'   => Country::all()->sum('deaths'),
		];

		return view('dashboard.bycountry.index', ['worldwideData'=>$data, 'data'=>Country::filter(request(['search', 'location', 'confirmed', 'deaths', 'recovered']))->get()]);
	}
}
