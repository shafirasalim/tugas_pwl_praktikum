<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('npm', 20)->primary();
            $table->string('username', 255);
            $table->string('first_name', 255);
            $table->string('last_name', 255);
            $table->string('email', 255)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->timestamps();
        });

        // DB::statement('ALTER TABLE users MODIFY npm INT(20) NOT NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};