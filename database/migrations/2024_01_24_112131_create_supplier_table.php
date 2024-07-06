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
        Schema::create('supplier', function (Blueprint $table) {
            $table->id();
            $table->string('supplier_name');
            $table->string('supplier_type');
            $table->string('supplier_id');
            $table->string('supplier_city');
            $table->text('supplier_address');
            $table->string('supplier_state');
            $table->string('supplier_country');
            $table->string('supplier_phone');
            $table->string('supplier_phone_alter')->nullable();
            $table->string('supplier_fax')->nullable();
            $table->string('supplier_email');
            $table->string('supplier_website');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier');
    }
};
