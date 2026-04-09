<?php

namespace Database\Factories;

use App\Models\LoanDetail;
use App\Models\Loan;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<LoanDetail>
 */
class LoanDetailFactory extends Factory
{
    public function definition(): array
    {
        return [
            'loan_id' => Loan::factory(),
            'book_id' => Book::factory(),
            'is_return' => $this->faker->boolean(70),
        ];
    }
}