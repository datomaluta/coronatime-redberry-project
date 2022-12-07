<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	use RefreshDatabase;

	protected function setUp(): void
	{
		parent::setUp();
		/* @var User $user */
		$this->user = User::factory()->create(
			['is_email_verified'=>1]
		);
	}

	public function test_dashboard_worldwide_redirect_to_login_if_user_is_not_logged_in_and_verified()
	{
		$response = $this->get(route('dashboard'));
		$response->assertRedirect(route('login'));
	}

	public function test_dashboard_worldwide_is_accessible_for_logged_in_and_verified_user()
	{
		$response = $this->actingAs($this->user)->get(route('dashboard'));
		$response->assertSuccessful('');
	}

	public function test_dashboard_country_redirect_to_login_if_user_is_not_logged_in_and_verified()
	{
		$response = $this->get(route('dashboard.country'));
		$response->assertRedirect(route('login'));
	}

	public function test_dashboard_country_is_accessible_for_logged_in_and_verified_user()
	{
		$response = $this->actingAs($this->user)->get(route('dashboard.country'));
		$response->assertSuccessful('');
	}

	public function test_on_dashboard_country_search()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['search'=>'ge']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_location_sorting_desc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['location'=>'desc']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_location_sorting_asc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['location'=>'asc']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_confirmed_sorting_desc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['confirmed'=>'desc']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_confirmed_sorting_asc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['confirmed'=>'asc']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_deaths_sorting_desc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['deaths'=>'desc']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_deathss_orting_asc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['deaths'=>'asc']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_recovered_sorting_desc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['recovered'=>'desc']);
		$response->assertSuccessful();
	}

	public function test_on_dashboard_recovereds_sorting_asc()
	{
		$response = $this->actingAs($this->user)->call('GET', '/dashboard-country', ['recovered'=>'asc']);
		$response->assertSuccessful();
	}
}
