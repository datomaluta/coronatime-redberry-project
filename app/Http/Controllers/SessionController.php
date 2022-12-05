<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
	public function login(LoginUserRequest $request)
	{
		$attributes = $request->validated();

		$rememberMe = $request->has('remember') ? true : false;

		$user = User::where('username', $attributes['username'])
		->orWhere('email', $attributes['username'])->first();

		if ($user && !$user->is_email_verified)
		{
			throw ValidationException::withMessages([
				'username' => [__('auth.not_verified')],
			]);
		}

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
