<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Mail\ResetMail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail as FacadesMail;
use Illuminate\Support\Str;

class PasswordController extends Controller
{
	public function submitShowPasswordForm(ForgetPasswordRequest $request)
	{
		$request->validated();

		$token = Str::random(64);

		DB::table('password_resets')->insert([
			'email'      => $request->email,
			'token'      => $token,
			'created_at' => Carbon::now(),
		]);

		FacadesMail::to($request->email)->send(new ResetMail($token));

		return redirect(route('confirm'));
	}

	public function submitResetPasswordForm(ResetPasswordRequest $request, $token)
	{
		$request->validationData();

		$resetData = DB::table('password_resets')
		->where([
			'token' => $token,
		])
		->first();

		$email = $resetData->email;

		$user = User::where('email', $email)
					->update(['password' =>bcrypt($request->password)]);

		DB::table('password_resets')->where(['email'=> $email])->delete();

		return redirect(route('password.changed'));
	}
}
