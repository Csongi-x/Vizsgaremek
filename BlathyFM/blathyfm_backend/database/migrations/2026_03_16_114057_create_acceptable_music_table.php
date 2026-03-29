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
        Schema::create('acceptable_music', function (Blueprint $table) {
            $table->id();
            $table->string("author", 100);
            $table->title("title", 100);
            $table->string("length", 4);
            $table->string("link", 70);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acceptable_music');
    }
};
