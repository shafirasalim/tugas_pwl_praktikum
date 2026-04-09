<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->bigInteger('user_npm');
            $table->date('loan_at');
            $table->date('return_at')->nullable();
            $table->timestamps();
            
            $table->foreign('user_npm')
                  ->references('npm')
                  ->on('users')
                  ->onDelete('restrict');
        });

        DB::statement('ALTER TABLE loans MODIFY id INT(20) NOT NULL AUTO_INCREMENT');
        // DB::statement('ALTER TABLE loans MODIFY user_npm INT(20) NOT NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};