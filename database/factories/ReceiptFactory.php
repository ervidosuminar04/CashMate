<?php

namespace Database\Factories;

use App\Models\Business;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receipt>
 */
class ReceiptFactory extends Factory
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
            'image_path' => 'receipts/demo.jpg',
            'raw_ocr_text' => $this->faker->paragraph(),
            'extracted_data' => [
                'merchant' => $this->faker->company(),
                'total' => $this->faker->randomFloat(2, 10000, 500000),
                'date' => $this->faker->date(),
            ],
            'status' => 'processed',
        ];
    }
}
