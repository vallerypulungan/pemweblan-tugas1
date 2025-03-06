<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('book', function (Blueprint $table) {
             $table->id('id_book'); // Primary key
            $table->string('title'); // Judul buku
            $table->foreignId('author_id')->constrained('authors', 'id_author')->onDelete('cascade'); // Foreign key
            $table->integer('published_year')->nullable(); // Tahun terbit
            $table->decimal('price', 10, 2); // Harga buku
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book');
    }
};
