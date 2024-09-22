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
            // Remove the 'fullname' column if it exists
            if (Schema::hasColumn('tezz', 'fullname')) {
                $table->dropColumn('fullname');
            }

            // Add the 'studid' column only if it doesn't exist
            if (!Schema::hasColumn('tezz', 'studid')) {
                $table->integer('studid')->after('subid'); // Adjust position if needed
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tezz', function (Blueprint $table) {
            // Re-add the 'fullname' column
            if (!Schema::hasColumn('tezz', 'fullname')) {
                $table->string('fullname')->nullable(); // Use nullable if needed
            }

            // Drop the 'studid' column if it exists
            if (Schema::hasColumn('tezz', 'studid')) {
                $table->dropColumn('studid');
            }
        });
    }
};
