<?php

namespace Database\Factories;

use App\Models\Advisory;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvisoryFactory extends Factory
{
    protected $model = Advisory::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'file' => $this->faker->imageUrl(),
            'position' => $this->faker->randomElement(['slide-category-page', 'banner-page-video', 'slide-page-video']),
            'isVideo' => $this->faker->boolean,
            'visible' => $this->faker->boolean,
        ];
    }
}