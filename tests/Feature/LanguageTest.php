<?php

namespace Tests\Feature;

use Tests\TestCase;

class LanguageTest extends TestCase
{
	public function test_language_switch_en()
	{
		$response = $this->get(route('lang.switch', 'en'));
		$response->assertSessionHasNoErrors();
	}

	public function test_language_switch_ka()
	{
		$response = $this->get(route('lang.switch', 'ka'));
		$response->assertSessionHasNoErrors();
	}

	public function test_language_redirect_back_if_provided_lang_is_not_in_config()
	{
		$response = $this->get(route('lang.switch', 'ru'));
		$response->assertRedirect();
	}
}
