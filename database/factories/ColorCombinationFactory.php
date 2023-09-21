<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ColorCombination>
 */
class ColorCombinationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'Default',
            'text_color' => '#FFFFFF',
            'bg_color' => '#F59E0A',
            'default' => true
        ];
    }
}
