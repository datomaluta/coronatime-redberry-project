<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function login(LoginUserRequest $request)
	{
		$attributes = $request->validated();

		$rememberMe = $request->has('remember') ? true : false;

		if (auth()->attempt(['username' => $attributes['username'], 'password' => $attributes['password']], $rememberMe))
		{
			return redirect(route('dashboard'));
		}
		elseif (auth()->attempt(['email' => $attributes['username'], 'password' => $attributes['password']], $rememberMe))
		{
			return redirect(route('dashboard'));
		}
		else
		{
			throw ValidationException::withMessages([
				'username' => [__('auth.failed')],
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
