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
        Schema::table('products', function (Blueprint $table) {
            $table->string('product_code')->after('description');
            $table->string('chemical_name')->after('product_code');
            $table->string('synonyme')->after('chemical_name');
            $table->string('cas_number')->after('synonyme');
            $table->string('molecular_formula')->after('cas_number');
            $table->string('molecular_weight')->after('molecular_formula');
            $table->string('specification')->after('molecular_weight');
            $table->string('packing')->after('specification');
            $table->string('availability')->after('packing');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
