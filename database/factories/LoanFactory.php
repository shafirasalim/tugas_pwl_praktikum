<?php

namespace Database\Factories;

use App\Models\Loan;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Loan>
 */
class LoanFactory extends Factory
{
    public function definition(): array
    {
        $loanDate = $this->faker->dateTimeBetween('-3 months', 'now');
        $returnDate = $this->faker->optional(0.6)->dateTimeBetween($loanDate, '+14 days');
        
        return [
            'user_npm' => User::factory(),
            'loan_at' => $loanDate,
            'return_at' => $returnDate,
        ];
    }
}