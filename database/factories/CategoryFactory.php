<?php

namespace Database\Factories;

use App\Models\Category;  // ← GANTI Model jadi Category
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
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
            'category' => $this->faker->unique()->word(),  
        ];
    }
}