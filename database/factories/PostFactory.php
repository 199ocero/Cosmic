<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use App\Enum\PostStatusEnum;
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
        $title = $this->faker->sentence();
        $title = rtrim($title, '.');

        $slug = Str::slug($title);

        return [
            'user_id' => User::factory(),
            'thumbnail' => $this->faker->imageUrl(),
            'title' => $title,
            'slug' => $slug,
            'content' => $this->faker->paragraph(10),
            'status' => PostStatusEnum::DRAFT,
            'featured' => $this->faker->boolean(10),
            'published_at' => $this->faker->dateTimeBetween('now', '+1 month'),
        ];
    }
}
