<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_accessible()
    {
        $response = $this->get(route('home'));
        $response->assertStatus(200);
    }

    public function test_about_page_is_accessible()
    {
        $response = $this->get(route('about'));
        $response->assertStatus(200);
    }

    public function test_videos_page_is_accessible()
    {
        $response = $this->get(route('videos'));
        $response->assertStatus(200);
    }

    public function test_contact_page_is_accessible()
    {
        $response = $this->get(route('contact'));
        $response->assertStatus(200);
    }
}