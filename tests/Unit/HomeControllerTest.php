<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\HomeController;
use App\Models\Advisory;
use App\Models\Video;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_opinion_returns_view_with_correct_data()
    {
        Video::factory()->count(5)->create(['category' => 'opinion']);
        Advisory::factory()->count(3)->create(['position' => 'slide-category-page', 'visible' => 1]);

        $response = $this->get(route('opinion'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.opinion');
        $response->assertViewHas('videos');
        $response->assertViewHas('advisoriesImagesUrl');
    }

    public function test_events_returns_view_with_correct_data()
    {
        Video::factory()->count(5)->create(['category' => 'events']);
        Advisory::factory()->count(3)->create(['position' => 'slide-category-page', 'visible' => 1]);

        $response = $this->get(route('events'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.events');
        $response->assertViewHas('videos');
        $response->assertViewHas('advisoriesImagesUrl');
    }

    public function test_portrait_returns_view_with_correct_data()
    {
        Video::factory()->count(5)->create(['category' => 'portrait']);
        Advisory::factory()->count(3)->create(['position' => 'slide-category-page', 'visible' => 1]);

        $response = $this->get(route('portrait'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.portrait');
        $response->assertViewHas('videos');
        $response->assertViewHas('advisoriesImagesUrl');
    }

    public function test_insolite_returns_view_with_correct_data()
    {
        Video::factory()->count(5)->create(['category' => 'insolite']);
        Advisory::factory()->count(3)->create(['position' => 'slide-category-page', 'visible' => 1]);

        $response = $this->get(route('insolite'));

        $response->assertStatus(200);
        $response->assertViewIs('pages.insolite');
        $response->assertViewHas('videos');
        $response->assertViewHas('advisoriesImagesUrl');
    }
}