<?php

namespace Database\Factories;

use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
{
    protected $model = Video::class;

    public function definition()
    {
        return [
            'youtube_id' => $this->faker->unique()->regexify('[a-zA-Z0-9_-]{11}'),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'premium_video' => $this->faker->boolean,
            'single_price' => $this->faker->randomFloat(2, 5, 50),
            'date_time_to_offer_free_access' => $this->faker->dateTime,
            'publication_date' => $this->faker->dateTime,
            'video_thumbnail' => $this->faker->imageUrl(),
            'video_preview' => $this->faker->imageUrl(),
            'highlighted' => $this->faker->boolean,
            'category' => $this->faker->randomElement(['opinion', 'events', 'portrait', 'insolite']),
            'video_creator_id' => null,
            'views' => $this->faker->numberBetween(0, 1000000),
        ];
    }
}