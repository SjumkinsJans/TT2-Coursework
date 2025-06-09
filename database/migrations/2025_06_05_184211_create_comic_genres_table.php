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
        Schema::create('comic_genres', function (Blueprint $table) {
            $table->id();
            $table->string('comic_genre');
            $table->timestamps();
        });

        Schema::table('comics',function (Blueprint $table) {
            $table->foreign('comic_genre_id')->references('id')->on('comic_genres')->OnDelete('cascade');
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_genres');
    }
};
