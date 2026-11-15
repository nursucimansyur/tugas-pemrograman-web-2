<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'item_code' => 'BRG-' . fake()->unique()->numberBetween(100, 999),
            'name' => fake()->words(2, true),
            'category' => fake()->randomElement(['Elektronik', 'Alat Tulis', 'Perabotan', 'Dapur']),
            'quantity' => fake()->numberBetween(1, 20),
            'condition' => fake()->randomElement(['Baik', 'Rusak Ringan', 'Rusak Berat']),
        ];
    }
}