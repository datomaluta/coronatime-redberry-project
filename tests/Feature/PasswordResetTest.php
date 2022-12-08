<?php

namespace Tests\Feature;

use App\Mail\ResetMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;
use Illuminate\Support\Facades\Mail as FacadesMail;

class PasswordResetTest extends TestCase
{
	use RefreshDatabase;

	public function test_reset_password_form_is_accessible()
	{
		$response = $this->get(route('forget.password.get'));
		$response->assertSuccessful();
	}

	public function test_reset_should_give_us_error_if_email_is_not_provided()
	{
		$response = $this->post(route('forget.password.post'));
		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_reset_should_give_us_error_if_provided_input_is_not_valid_email()
	{
		$response = $this->post(route('forget.password.post'), [
			'email'=> 'testgmail.com',
		]);
		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_reset_should_give_us_error_if_provided_email_does_not_exists_in_database()
	{
		$response = $this->post(route('forget.password.post'), [
			'email'=> 'test@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_send_email_for_reset()
	{
		$email = 'gela@gmai.com';
		$user = User::factory()->create([
			'email'=> $email,
		]);

		FacadesMail::fake();

		$response = $this->post(route('forget.password.post', [
			'email' => $email,
		]));

		FacadesMail::assertSent(ResetMail::class, function ($mail) {
			$mail->envelope();
			$mail->content();
			return true;
		});

		$response->assertRedirect(route('confirm'));
	}

	public function test_set_new_password_page_is_accessible()
	{
		$email = 'gela@gmai.com';
		User::factory()->create([
			'email'=> $email,
		]);

		$this->post(route('forget.password.post', [
			'email' => $email,
		]));

		$token = DB::table('password_resets')->first()->token;

		$response = $this->get(route('reset.password.get', $token));
		$response->assertSuccessful();
	}

	public function test_new_password_should_give_us_error_if_inputs_is_not_provided()
	{
		$email = 'gela@gmai.com';
		User::factory()->create([
			'email'=> $email,
		]);

		$this->post(route('forget.password.post', [
			'email' => $email,
		]));

		$token = DB::table('password_resets')->first()->token;

		$response = $this->post(route('reset.password.post', $token));
		$response->assertSessionHasErrors([
			'password',
			'repeat_password',
		]);
	}

	public function test_new_password_should_give_us_error_if_password_input_is_less_than_4_symbols()
	{
		$email = 'gela@gmai.com';
		User::factory()->create([
			'email'=> $email,
		]);

		$this->post(route('forget.password.post', [
			'email' => $email,
		]));

		$token = DB::table('password_resets')->first()->token;

		$response = $this->post(route('reset.password.post', $token), [
			'password'=> 'pas',
		]);

		$response->assertSessionHasErrors([
			'password',
			'repeat_password',
		]);
	}

	public function test_new_password_should_give_us_error_if_passwords_does_not_match()
	{
		$email = 'gela@gmai.com';
		User::factory()->create([
			'email'=> $email,
		]);

		$this->post(route('forget.password.post', [
			'email' => $email,
		]));

		$token = DB::table('password_resets')->first()->token;

		$response = $this->post(route('reset.password.post', $token), [
			'password'       => 'password',
			'repeat_password'=> 'nopassword',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_user_can_set_new_password()
	{
		$email = 'gela@gmai.com';
		$password = 'password';
		$user = User::factory()->create([
			'email'=> $email,
		]);

		$this->post(route('forget.password.post', [
			'email' => $email,
		]));

		$token = DB::table('password_resets')->first()->token;

		$response = $this->post(route('reset.password.post', $token), [
			'password'       => $password,
			'repeat_password'=> $password,
		]);

		$user->update(['password' =>bcrypt($password)]);

		DB::table('password_resets')->where(['email'=> $email])->delete();

		$response->assertRedirect(route('password.changed'));
	}
}
