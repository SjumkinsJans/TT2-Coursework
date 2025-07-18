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
        Schema::create('comic_images', function (Blueprint $table) {
            $table->id();
            $table->integer('page');
            $table->string('image');
            $table->timestamps();

            //FK
            $table->unsignedBigInteger('comic_id');
            $table->foreign('comic_id')->references('id')->on('comics')->OnDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comic_images');
    }
};
