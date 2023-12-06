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
        Schema::create('gallery_images', function (Blueprint $table) {
            $table->id('gallery_image_id');
            $table->string('gallery_image_title', 255);
            $table->string('gallery_image_slug', 255);
            $table->unsignedBigInteger('media_id')->nullable();
            $table->string('img_alt')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
