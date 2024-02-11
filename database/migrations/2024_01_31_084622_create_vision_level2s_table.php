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
        Schema::create('vision_level2s', function (Blueprint $table) {
            $table->id();
             $table->string('title');
            $table->text('description')->nullable();
          $table->unsignedBigInteger('version_level1_id');
            $table->foreign('version_level1_id')->references('id')->on('vision_level1s')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_level2s');
    }
};
