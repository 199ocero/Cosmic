<?php

namespace Database\Factories;

use App\Enum\PostStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'thumbnail' => $this->faker->imageUrl(),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'content' => $this->faker->paragraph(10),
            'status' => PostStatusEnum::DRAFT,
            'featured' => $this->faker->boolean(10),
            'published_at' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
