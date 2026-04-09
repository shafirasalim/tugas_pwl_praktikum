<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Bookshelf;
use App\Models\Book;
use App\Models\Loan;
use App\Models\LoanDetail;
use App\Models\BookReturn;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        
        $this->command->info('Creating 50 categories...');
        $categories = [];
        for ($i = 1; $i <= 50; $i++) {
            $categories[] = Category::create([
                'category' => 'Category ' . $i,
            ]);
        }
        
        $this->command->info('Creating 50 bookshelfs...');
        $bookshelfs = [];
        for ($i = 1; $i <= 50; $i++) {
            $bookshelfs[] = Bookshelf::create([
                'code' => 'RK-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => 'Rak ' . $i,
            ]);
        }
        
        $this->command->info('Creating 50 books...');
        foreach ($categories as $index => $category) {
            Book::create([
                'id' => $category->id,
                'title' => 'Buku ' . ($index + 1),
                'author' => 'Penulis ' . ($index + 1),
                'year' => rand(2010, 2024),
                'publisher' => 'Penerbit ' . ($index + 1),
                'city' => 'Kota ' . ($index + 1),
                'cover' => 'cover_' . ($index + 1) . '.jpg',
                'bookshelf_id' => $bookshelfs[array_rand($bookshelfs)]->id,
            ]);
        }
        
        $this->command->info('Creating 50 users...');
        for ($i = 1; $i <= 50; $i++) {
            if ($i <= 10) {
                $angkatan = 21;
                $urutan = str_pad($i, 3, '0', STR_PAD_LEFT);      // ← 3 DIGIT
            } elseif ($i <= 20) {
                $angkatan = 22;
                $urutan = str_pad($i - 10, 3, '0', STR_PAD_LEFT); // ← 3 DIGIT
            } elseif ($i <= 30) {
                $angkatan = 23;
                $urutan = str_pad($i - 20, 3, '0', STR_PAD_LEFT); // ← 3 DIGIT
            } elseif ($i <= 40) {
                $angkatan = 24;
                $urutan = str_pad($i - 30, 3, '0', STR_PAD_LEFT); // ← 3 DIGIT
            } else {
                $angkatan = 25;
                $urutan = str_pad($i - 40, 3, '0', STR_PAD_LEFT); // ← 3 DIGIT
            }
            
            $npm = (int)("55201" . $angkatan . $urutan);
            
            User::create([
                'npm' => $npm,
                'username' => 'user_' . $npm,
                'first_name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'email' => 'user' . $npm . '@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
            ]);
        }
        
        $this->command->info('Creating 50 loans...');
        $users = User::all();
        $loans = [];
        for ($i = 1; $i <= 50; $i++) {
            $loanDate = $faker->dateTimeBetween('-3 months', 'now');
            $returnDate = $faker->optional(0.6)->dateTimeBetween($loanDate, '+14 days');
            
            $loans[] = Loan::create([
                'user_npm' => $users->random()->npm,
                'loan_at' => $loanDate,
                'return_at' => $returnDate,
            ]);
        }
        
        $this->command->info('Creating loan details...');
        $books = Book::all();
        foreach ($loans as $loan) {
            $numBooks = rand(2, 5);
            for ($j = 1; $j <= $numBooks; $j++) {
                LoanDetail::create([
                    'loan_id' => $loan->id,
                    'book_id' => $books->random()->id,
                    'is_return' => (bool)rand(0, 1),
                ]);
            }
        }
        
        $this->command->info('Creating returns...');
        $loanDetails = LoanDetail::where('is_return', true)->get();
        foreach ($loanDetails as $detail) {
            BookReturn::create([
                'loan_detail_id' => $detail->id,
                'charge' => (bool)rand(0, 1),
                'amount' => rand(0, 30000),
            ]);
        }
    }
}