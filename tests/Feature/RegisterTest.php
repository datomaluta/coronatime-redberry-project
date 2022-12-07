<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail as FacadesMail;

class RegisterTest extends TestCase
{
	use RefreshDatabase;

	public function test_register_page_is_accessible()
	{
		$response = $this->get('/register');
		$response->assertSuccessful();
		$response->assertViewIs('register.create');
	}

	public function test_register_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('/register');
		$response->assertSessionHasErrors([
			'username',
			'email',
			'password',
			'repeat_password',
		]);
	}

	public function test_register_should_give_us_username_error_if_we_wont_provide_username_input()
	{
		$response = $this->post('/register', [
			'email'          => 'test@gmail.com',
			'password'       => 'password',
			'repeat_password'=> 'password',
		]);
		$response->assertSessionHasErrors([
			'username',
		]);

		$response->assertSessionDoesntHaveErrors(['email', 'password', 'repeat_password']);
	}

	public function test_register_should_give_us_email_error_if_we_wont_provide_email_input()
	{
		$response = $this->post('/register', [
			'username'          => 'test',
			'password'          => 'password',
			'repeat_password'   => 'password',
		]);
		$response->assertSessionHasErrors([
			'email',
		]);

		$response->assertSessionDoesntHaveErrors(['username', 'password', 'repeat_password']);
	}

	public function test_register_should_give_us_password_error_if_we_wont_provide_password_input()
	{
		$response = $this->post('/register', [
			'username'          => 'test',
			'email'             => 'test@gmail.com',
			'repeat_password'   => 'password',
		]);
		$response->assertSessionHasErrors([
			'password',
		]);

		$response->assertSessionDoesntHaveErrors(['username', 'email', 'repeat_password']);
	}

	public function test_register_should_give_us_repeat_password_error_if_we_wont_provide_repeat_password_input()
	{
		$response = $this->post('/register', [
			'username'          => 'test',
			'email'             => 'test@gmail.com',
			'password'          => 'password',
		]);
		$response->assertSessionHasErrors([
			'password',
			'repeat_password',
		]);

		$response->assertSessionDoesntHaveErrors(['username', 'email']);
	}

	public function test_register_should_give_us_error_if_password_fields_does_not_match()
	{
		$response = $this->post('/register', [
			'username'          => 'test',
			'email'             => 'test@gmail.com',
			'password'          => 'password',
			'repeat_password'   => 'notpassword',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);

		$response->assertSessionDoesntHaveErrors(['username', 'email']);
	}

	public function test_register_should_give_us_username_error_if_username_field_contains_less_than_3_symbols()
	{
		$response = $this->post('/register', [
			'username'          => 'te',
			'email'             => 'test@gmail.com',
			'password'          => 'password',
			'repeat_password'   => 'password',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);

		$response->assertSessionDoesntHaveErrors(['email', 'password', 'repeat_password']);
	}

	public function test_register_should_give_us_email_error_if_we_provide_invalid_email()
	{
		$response = $this->post('/register', [
			'username'          => 'test',
			'email'             => 'testgmail.com',
			'password'          => 'password',
			'repeat_password'   => 'password',
		]);

		$response->assertSessionHasErrors([
			'email',
		]);

		$response->assertSessionDoesntHaveErrors(['username', 'password', 'repeat_password']);
	}

	public function test_register_should_give_us_password_error_if_password_field_contains_less_than_4_symbols()
	{
		$response = $this->post('/register', [
			'username'          => 'test',
			'email'             => 'test@gmail.com',
			'password'          => 'pas',
			'repeat_password'   => 'password',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);

		$response->assertSessionDoesntHaveErrors(['email', 'username']);
	}

	public function test_register_should_give_us_repeat_password_error_if_repeat_password_field_contains_less_than_4_symbols()
	{
		$response = $this->post('/register', [
			'username'          => 'test',
			'email'             => 'test@gmail.com',
			'password'          => 'password',
			'repeat_password'   => 'pas',
		]);

		$response->assertSessionHasErrors([
			'repeat_password',
		]);

		$response->assertSessionDoesntHaveErrors(['email', 'username']);
	}

	public function test_register_should_give_us_username_error_if_user_already_exists_with_provided_username()
	{
		User::factory()->create([
			'username'         => 'test',
			'email'            => 'test@gmail.com',
			'is_email_verified'=> 1,
		]);

		$response = $this->post('/register', [
			'username'       => 'test',
			'email'          => 'fortesting@gmail.com',
			'password'       => 'password',
			'repeat_password'=> 'password',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_register_should_give_us_email_error_if_user_already_exists_with_provided_email()
	{
		User::factory()->create([
			'username'         => 'test',
			'email'            => 'test@gmail.com',
			'is_email_verified'=> 1,
		]);

		$response = $this->post('/register', [
			'username'       => 'elguja',
			'email'          => 'test@gmail.com',
			'password'       => 'password',
			'repeat_password'=> 'password',
		]);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_email_confirmation()
	{
		$username = 'gela';
		$email = 'gela@gmail.com';
		$password = 'password';
		$repeat_password = 'password';

		FacadesMail::fake();

		$response = $this->post('/register', [
			'username'       => $username,
			'email'          => $email,
			'password'       => $password,
			'repeat_password'=> $repeat_password,
		]);

		$userVerify = UserVerify::first();

		$token = $userVerify->token;

		FacadesMail::send('email.email-verification', ['token' => $token], function ($message) use ($email) {
			$message->to($email);
			$message->subject('Email Verification Mail');
		});

		FacadesMail::assertSent();
		FacadesMail::assertNothingSent();

		$response->assertRedirect(route('confirm'));

		$responseVerify = $this->get(route('user.verify', $token));

		$user = $userVerify->user;
		$user->is_email_verified = 1;
		$user->email_verified_at = now();

		$responseVerify->assertRedirect(route('confirmed'));
	}
}
