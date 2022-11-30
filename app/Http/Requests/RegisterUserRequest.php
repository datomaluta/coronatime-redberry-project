<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterUserRequest extends FormRequest
{
	public function rules()
	{
		return [
			'username'       => ['required', 'min:3', Rule::unique('users', 'username')],
			'email'          => ['required', 'email', Rule::unique('users', 'email')],
			'password'       => 'required|min:4|required_with:repeat_password|same:repeat_password',
			'repeat_password'=> 'required|min:4',
		];
	}
}
