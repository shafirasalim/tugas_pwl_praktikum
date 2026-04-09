<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('returns', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->integer('loan_detail_id');
            $table->boolean('charge'); 
            $table->integer('amount');
            
            $table->foreign('loan_detail_id')
                  ->references('id')
                  ->on('loan_details')
                  ->onDelete('cascade');
        });

        DB::statement('ALTER TABLE returns MODIFY id INT(20) NOT NULL AUTO_INCREMENT');
        DB::statement('ALTER TABLE returns MODIFY loan_detail_id INT(20) NOT NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('returns');
    }
};