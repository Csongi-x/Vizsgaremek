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
        Schema::create('requested_music', function (Blueprint $table) {
            $table->id();
            $table->string("email", 100);
            $table->string("author", 100);
            $table->string("title", 100);
            $table->string("length", 4);
            $table->string("link", 100);
            $table->string("message", 160)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requested_music');
    }
};
