<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
	public function rules()
	{
		return [
			'username'   => 'required|min:3',
            'email'=>'required|email',
			'password'   => 'required|min:4|required_with:repeat_password|same:repeat_password',
            'repeat_password'=>'required|min:4'
		];
	}
}
