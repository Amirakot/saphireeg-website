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
        Schema::create('vision_level1s', function (Blueprint $table) {
            $table->id();
               $table->string('title');
            $table->text('description')->nullable();
          $table->unsignedBigInteger('version_id');
            $table->foreign('version_id')->references('id')->on('visions')->onDelete('cascade');
            // $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vision_level1s');
    }
};
