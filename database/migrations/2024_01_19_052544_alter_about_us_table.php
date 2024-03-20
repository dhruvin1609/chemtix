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
        Schema::table('about_us', function (Blueprint $table) {
           $table->text('company_philosofy');
           $table->text('our_values');
           $table->text('quality');
           $table->text('how_we_work');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('about_us', function (Blueprint $table) {
            $table->dropColumn('company_philosofy');
            $table->dropColumn('our_values');
            $table->dropColumn('quality');
            $table->dropColumn('how_we_work');
         });
    }
};
