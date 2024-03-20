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
        Schema::table('supplier', function (Blueprint $table) {
            $table->string('supplier_gst_no')->after('supplier_website');
            $table->string('supplier_msme')->after('supplier_gst_no');
            $table->string('supplier_pan_no')->after('supplier_msme');
            $table->string('supplier_drug_lic_no')->after('supplier_pan_no');
         });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supplier', function (Blueprint $table) {
            $table->dropColumn('supplier_gst_no');
            $table->dropColumn('supplier_msme');
            $table->dropColumn('supplier_pan_no');
            $table->dropColumn('supplier_drug_lic_no');
         });
    }
};
