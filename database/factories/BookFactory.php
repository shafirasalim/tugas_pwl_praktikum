<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\Bookshelf;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Book>
 */
class BookFactory extends Factory
{
    public function definition(): array
    {

        $category = Category::factory()->create();
        
        return [
            'id' => $category->id,  
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'year' => $this->faker->year(),
            'publisher' => $this->faker->company(),
            'city' => $this->faker->city(),
            'cover' => $this->faker->imageUrl(),
            'bookshelf_id' => Bookshelf::factory(),
        ];
    }
}