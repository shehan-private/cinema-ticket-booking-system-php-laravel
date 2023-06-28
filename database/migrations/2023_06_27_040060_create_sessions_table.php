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
            $table->foreignId('screen_id')->constrained();
            $table->foreignID('movie_id')->constrained();
            $table->integer('date');
            $table->foreignId('time_id')->constrained();
            $table->string('status',10);
            $table->integer('attend_full');
            $table->integer('attend_half');
            $table->decimal('income',10,2);
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
