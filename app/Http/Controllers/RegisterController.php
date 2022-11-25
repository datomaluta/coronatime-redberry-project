<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;

class RegisterController extends Controller
{
	public function store(RegisterUserRequest $request)
	{
		$attributes = $request->validated();

        User::create($attributes);

        return redirect('login');
	}
}
