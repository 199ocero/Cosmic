<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(rand(1, 2));
        $title = rtrim($title, '.');

        $slug = Str::slug($title);

        return [
            'title' => $title,
            'slug' => $slug,
            'color' => 'rgb(' . Color::Amber['500'] . ')'
        ];
    }
}
