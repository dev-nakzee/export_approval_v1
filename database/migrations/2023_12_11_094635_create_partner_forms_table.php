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
        Schema::create('partner_forms', function (Blueprint $table) {
            $table->id('partner_form_id');
            $table->string('organization_name');
            $table->string('contact_person_name');
            $table->string('designation_name');
            $table->string('address_street');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('country');
            $table->string('country_code');
            $table->string('phone_number');
            $table->string('email');
            $table->string('website')->nullable();
            $table->string('offerings')->nullable();
            $table->string('position_interested');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_forms');
    }
};
