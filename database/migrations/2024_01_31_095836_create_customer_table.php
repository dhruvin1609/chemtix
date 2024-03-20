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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->string('customer_type');
            $table->string('customer_city');
            $table->text('customer_address');
            $table->string('customer_state');
            $table->string('customer_country');
            $table->string('customer_phone');
            $table->string('customer_phone_alter')->nullable();
            $table->string('customer_fax')->nullable();
            $table->string('customer_email');
            $table->string('customer_website')->nullable();
            $table->string('contact_name');
            $table->string('contact_phone');
            $table->string('contact_designation');
            $table->string('contact_email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
