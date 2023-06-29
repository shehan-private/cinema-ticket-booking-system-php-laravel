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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->integer('date');
            $table->foreignId('screen_id')->constrained();
            $table->foreignId('time_id')->constrained();
            $table->foreignID('movie_id')->constrained();
            $table->string('status',10);
            $table->integer('attend_full')->nullable();
            $table->integer('attend_half')->nullable();
            $table->decimal('income',10,2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions');
    }
};
