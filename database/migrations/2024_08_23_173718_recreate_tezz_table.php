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
        Schema::create('tezz', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID (primary key)
            $table->unsignedBigInteger('classid'); // Unsigned integer for class ID
            $table->unsignedBigInteger('subid'); // Unsigned integer for subject ID
            $table->integer('studid'); // String for fullname
            $table->integer('testscore'); // Integer for test score
            $table->unsignedBigInteger('sessid'); // Unsigned integer for session ID
            $table->unsignedBigInteger('termid'); // Unsigned integer for term ID
            $table->integer('examscore'); // Integer for exam score
            $table->integer('toal'); // Integer for total score
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tezz');
    }
};
