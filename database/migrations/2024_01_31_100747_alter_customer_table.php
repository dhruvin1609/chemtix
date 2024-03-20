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
        Schema::table('customer', function (Blueprint $table) {
            $table->string('customer_gst_no')->after('customer_website');
            $table->string('customer_msme')->after('customer_gst_no');
            $table->string('customer_pan_no')->after('customer_msme');
            $table->string('customer_drug_lic_no')->after('customer_pan_no');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer', function (Blueprint $table) {
            $table->dropColumn('customer_gst_no');
            $table->dropColumn('customer_msme');
            $table->dropColumn('customer_pan_no');
            $table->dropColumn('customer_drug_lic_no');
         });
    }
};
