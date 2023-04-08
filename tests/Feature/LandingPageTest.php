<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LandingPageTest extends TestCase
{
  
    public function test_the_app_temporarly_redirect_to_the_admin_page()
    {
        $response = $this->get('/');

        $response->assertStatus(302);
    }

    public function test_login_screen_can_be_rendered(){
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }
}
