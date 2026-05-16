<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'business_id' => Business::factory(),
            'name' => $this->faker->word(),
            'type' => $this->faker->randomElement(['income', 'expense']),
            'icon' => 'category',
            'color' => $this->faker->hexColor(),
            'is_default' => false,
        ];
    }
}
