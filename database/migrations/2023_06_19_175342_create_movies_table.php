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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director')->nullable(); 
            $table->string('writer')->nullable();
            $table->string('actors')->nullable();
            $table->string('duration')->nullable();
            $table->string('genre')->nullable();
            $table->string('imdbRanking')->nullable();
            $table->string('storyline')->nullable();
            $table->string('status');
            $table->string('initial_screening')->nullable();
            $table->string('trailer')->nullable();
            $table->string('landscape_image')->nullable();
            $table->string('portrait_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
