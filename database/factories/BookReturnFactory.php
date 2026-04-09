<?php

namespace Database\Factories;

use App\Models\BookReturn;
use App\Models\LoanDetail;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<BookReturn>
 */
class BookReturnFactory extends Factory
{
    protected $model = BookReturn::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'loan_detail_id' => LoanDetail::factory(),
            'charge' => $this->faker->boolean(40),
            'amount' => $this->faker->randomElement([0, 5000, 10000, 15000, 20000]),
        ];
    }
}