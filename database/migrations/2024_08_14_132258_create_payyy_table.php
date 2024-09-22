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
        Schema::create('payyy', function (Blueprint $table) {
            $table->id(); 
            $table->integer('classid'); 
            $table->string('invoiceid')->nullable(); 
            $table->string('fulln'); 
            $table->decimal('amt', 8, 2); 
            $table->string('sess'); 
            $table->date('pos'); 
            $table->string('tem'); 
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payyy');
    }
};
