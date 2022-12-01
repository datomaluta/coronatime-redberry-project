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
}
