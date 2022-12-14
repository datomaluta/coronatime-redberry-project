<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
{
	use RefreshDatabase;

	public function test_login_page_is_accessisble()
	{
		$response = $this->get('/login');
		$response->assertSuccessful('');
		$response->assertViewIs('auth.login');
	}

	public function test_auth_should_give_us_errors_if_input_is_not_provided()
	{
		$response = $this->post('/login');
		$response->assertSessionHasErrors([
			'username',
			'password',
		]);
	}

	public function test_auth_should_give_us_username_error_if_we_wont_provide_username_input()
	{
		$response = $this->post('/login', [
			'password'=> 'password',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);

		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_password_error_if_we_wont_provide_password_input()
	{
		$response = $this->post('/login', [
			'username'=> 'admin',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);

		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_auth_should_give_us_username_error_when_username_field_contains_less_than_3_symbols()
	{
		$response = $this->post('/login', [
			'username'=> 'Ia',
			'password'=> 'password',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);

		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_us_password_error_when_password_field_contains_less_than_4_symbols()
	{
		$response = $this->post('/login', [
			'username'=> 'admin',
			'password'=> 'pas',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);

		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_login_is_impossible_if_user_email_is_not_verified_login_with_username()
	{
		$username = 'admin';
		$email = 'admin@gmail.com';
		$password = 'password';

		User::factory()->create(
			[
				'username'         => $username,
				'email'            => $email,
				'password'         => $password,
				'is_email_verified'=> 0,
			]
		);

		$response = $this->post('/login', [
			'username'   => $username,
			'password'   => $password,
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_login_is_impossible_if_user_email_is_not_verified_login_with_email()
	{
		$username = 'admin';
		$email = 'admin@gmail.com';
		$password = 'password';

		User::factory()->create(
			[
				'username'         => $username,
				'email'            => $email,
				'password'         => $password,
				'is_email_verified'=> 0,
			]
		);

		$response = $this->post('/login', [
			'username'   => $email,
			'password'   => $password,
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_auth_should_give_us_incorrect_credentials_error_when_such_user_does_not_exists()
	{
		$response = $this->post('/login', [
			'username'=> 'admin',
			'password'=> 'password',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_auth_should_redirect_to_dashboard_page_after_successfull_login_with_username()
	{
		$username = 'admin';
		$email = 'admin@gmail.com';
		$password = 'password';

		User::factory()->create(
			[
				'username'         => $username,
				'email'            => $email,
				'password'         => $password,
				'is_email_verified'=> 1,
			]
		);

		$response = $this->post('/login', [
			'username'   => $username,
			'password'   => $password,
		]);

		$response->assertRedirect(route('dashboard'));
	}

	public function test_auth_should_redirect_to_dashboard_page_after_successfull_login_with_email()
	{
		$username = 'admin';
		$email = 'admin@gmail.com';
		$password = 'password';

		User::factory()->create(
			[
				'username'         => $username,
				'email'            => $email,
				'password'         => $password,
				'is_email_verified'=> 1,
			]
		);

		$response = $this->post('/login', [
			'username'   => $email,
			'password'   => $password,
		]);

		$response->assertRedirect(route('dashboard'));
	}

	public function test_user_can_successfully_logout()
	{
		/** @var User $user */
		$user = User::factory()->create();

		$this->actingAs($user)->post('/logout')->assertRedirect('login');
	}
}
