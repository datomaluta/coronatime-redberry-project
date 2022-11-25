<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
{
	public function rules()
	{
		return [
			'username'   => 'required|min:3',
			'password'   => 'required|min:4',
			
		];
	}
}
