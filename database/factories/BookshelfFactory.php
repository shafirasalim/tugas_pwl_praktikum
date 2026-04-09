<?php

namespace Database\Factories;

use App\Models\Bookshelf;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Bookshelf>
 */
class BookshelfFactory extends Factory
{
    public function definition(): array
    {
        return [
            'code' => $this->faker->unique()->bothify('RK-###'),
            'name' => $this->faker->word() . ' Shelf',
        ];
    }
}