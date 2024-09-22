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
        Schema::table('admin', function (Blueprint $table) {
            // Add columns with default values if they don't already exist
            if (!Schema::hasColumn('admin', 'passupdat')) {
                $table->integer('passupdat')->default(0); // Change to integer type
            }

            if (!Schema::hasColumn('admin', 'ket')) {
                $table->integer('ket')->default(0); // Change to integer type
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admin', function (Blueprint $table) {
            // Drop the columns if they exist
            if (Schema::hasColumn('admin', 'passupdat')) {
                $table->dropColumn('passupdat');
            }

            if (Schema::hasColumn('admin', 'ket')) {
                $table->dropColumn('ket');
            }
        });
    }
};

