<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail as FacadesMail;

class RegisterController extends Controller
{
	public function store(RegisterUserRequest $request)
	{
		$attributes = $request->validated();

		$createUser = User::create($attributes);

		$token = Str::random(64);

		UserVerify::create([
			'user_id' => $createUser->id,
			'token'   => $token,
		]);

		FacadesMail::send('email.email-verification', ['token' => $token], function ($message) use ($request) {
			$message->to($request->email);
			$message->subject('Email Verification Mail');
		});

		return redirect(route('confirm'));
	}

	public function verifyAccount($token)
	{
		$verifyUser = UserVerify::where('token', $token)->first();

		if (!is_null($verifyUser))
		{
			$user = $verifyUser->user;

			if (!$user->is_email_verified)
			{
				$user->is_email_verified = 1;
				$user->email_verified_at = now();
				$user->save();
			}
		}

		return redirect(route('confirmed'));
	}
}
