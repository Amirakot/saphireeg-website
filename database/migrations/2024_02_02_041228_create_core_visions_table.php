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
        Schema::create('core_visions', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان الرؤية الأساسية
            $table->text('description')->nullable();
            $table->unsignedBigInteger('vision_level1_id'); // مفتاح خارجي يشير إلى عنوان محدد في جدول الرؤى
            $table->foreign('vision_level1_id')->references('id')->on('vision_level1s')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('core_visions');
    }
};
