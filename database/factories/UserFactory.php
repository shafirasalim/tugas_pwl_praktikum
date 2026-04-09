<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        static $counter = 0;
        $counter++;
        
        
        if ($counter > 50) {
            $counter = 1;
        }
        
        
        $indexAngkatan = floor(($counter - 1) / 10);
        
        
        if ($indexAngkatan > 4) {
            $indexAngkatan = 4;
        }
        
        $angkatanOptions = [21, 22, 23, 24, 25];
        $angkatan = $angkatanOptions[$indexAngkatan];
        $urutan = str_pad((($counter - 1) % 10) + 1, 2, '0', STR_PAD_LEFT);
        $npm = (int)("55201" . $angkatan . $urutan);
        
        return [
            'npm' => $npm,
            'username' => $this->faker->unique()->userName(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ];
    }
}