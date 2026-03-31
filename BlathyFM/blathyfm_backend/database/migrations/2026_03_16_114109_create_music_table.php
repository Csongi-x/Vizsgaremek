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
        Schema::create('music', function (Blueprint $table) {
            $genres = ["hit", "rock", "metal", "pop", "hip-hop", "jazz", "reggae", "alternative", "vaporwave", "country", "electronic", "folk", "other"];
            $table->id();
            $table->string("author", 100);
            $table->string("title", 100);
            $table->string("length", 4);
            $table->enum("genre", $genres);
            $table->string("link", 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('music');
    }
};
