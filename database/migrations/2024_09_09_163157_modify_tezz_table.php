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
        Schema::table('tezz', function (Blueprint $table) {
            // Remove the 'fullname' column
            $table->dropColumn('fullname');
            
            // Add the 'studid' column as an integer
            $table->integer('studid')->after('subid'); // You can adjust the position if needed
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tezz', function (Blueprint $table) {
            // Re-add the 'fullname' column
            $table->string('fullname');
            
            // Drop the 'studid' column
            $table->dropColumn('studid');
        });
    }
};
