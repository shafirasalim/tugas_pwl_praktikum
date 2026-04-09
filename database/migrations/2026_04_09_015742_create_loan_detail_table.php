<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loan_details', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('loan_id');
            $table->integer('book_id');
            $table->boolean('is_return')->default(false);
            $table->timestamps();
            
            $table->foreign('loan_id')
                  ->references('id')
                  ->on('loans')
                  ->onDelete('cascade');
            
            $table->foreign('book_id')
                  ->references('id')
                  ->on('books')
                  ->onDelete('restrict');
        });
        DB::statement('ALTER TABLE loan_details MODIFY id INT(20) NOT NULL AUTO_INCREMENT');
        DB::statement('ALTER TABLE loan_details MODIFY loan_id INT(20) NOT NULL');
        DB::statement('ALTER TABLE loan_details MODIFY book_id INT(20) NOT NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('loan_details');
    }
};