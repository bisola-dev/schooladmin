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
        Schema::create('ova', function (Blueprint $table) {
            $table->id(); // Automatically adds an auto-incrementing primary key
            $table->unsignedBigInteger('classid');
            $table->unsignedBigInteger('subid');
            $table->unsignedTinyInteger('termid');
            $table->unsignedBigInteger('sessid');
            $table->integer('scori');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ova');
    }
};
