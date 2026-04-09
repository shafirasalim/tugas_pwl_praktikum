<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->integer('id')->primary();
            $table->string('title', 255);
            $table->string('author', 255);
            $table->year('year');
            $table->string('publisher', 255);
            $table->string('city', 255);
            $table->string('cover', 255);
            $table->integer('bookshelf_id'); // Foreign key ke bookshelfs.id
            $table->timestamps();
            
            $table->foreign('id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('bookshelf_id')->references('id')->on('bookshelfs')->onDelete('restrict');
        });

        DB::statement('ALTER TABLE books MODIFY id INT(20) NOT NULL');
        DB::statement('ALTER TABLE books MODIFY bookshelf_id INT(20) NOT NULL');
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};