<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
{
	public function rules()
	{
		return [
			'password'       => 'required|min:4|required_with:repeat_password|same:repeat_password',
			'repeat_password'=> 'required|min:4',
		];
	}
}
