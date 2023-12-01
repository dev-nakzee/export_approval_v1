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
        Schema::table('static_page_sections', function (Blueprint $table) {
            //
            $table->string('section_slug')->after('section_name')->nullable();
            $table->string('section_color')->after('section_content')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('static_page_sections', function (Blueprint $table) {
            //
        });
    }
};
