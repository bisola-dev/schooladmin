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
        // Drop the existing table if it exists
        Schema::dropIfExists('payyy');

        // Create the new table
        Schema::create('payyy', function (Blueprint $table) {
            $table->id();
            $table->integer('classid');
            $table->string('invoiceid')->nullable();
            $table->integer('studid'); // New column
            $table->decimal('amt', 8, 2);
            $table->string('sessid');
            $table->integer('payid'); 
            $table->string('termid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the table
        Schema::dropIfExists('payyy');
    }
};

