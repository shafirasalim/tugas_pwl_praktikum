<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookshelfs', function (Blueprint $table) {
            $table->integer('id')->primary()->autoIncrement();
            $table->string('code', 10);
            $table->string('name', 255);
        });

        DB::statement('ALTER TABLE bookshelfs MODIFY id INT(20) NOT NULL AUTO_INCREMENT');
    }

    public function down(): void
    {
        Schema::dropIfExists('bookshelfs');
    }
};