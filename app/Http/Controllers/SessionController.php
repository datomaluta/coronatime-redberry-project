<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function login(LoginUserRequest $request)
	{
		$attributes = $request->validated();

		if (auth()->attempt(['username' => $attributes['username'], 'password' => $attributes['password']]))
		{
			return redirect(route('dashboard'));
		}
		elseif (auth()->attempt(['email' => $attributes['username'], 'password' => $attributes['password']]))
		{
			return redirect(route('dashboard'));
		}
		else
		{
			throw ValidationException::withMessages([
				'username'=> 'Your provided credentials not be verified.',
			]);
		}

		session()->regenerate();
	}

	public function logout()
	{
		auth()->logout();

		return redirect(route('login'));
	}
}