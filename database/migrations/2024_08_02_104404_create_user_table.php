<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Name of the user
            $table->string('email')->unique(); // Email address of the user, should be unique
            $table->string('password'); // Password field
            $table->integer('role'); // Role of the user (e.g., 1 for admin, 2 for user, etc.)
            $table->timestamps(); // Created at and updated at timestamps

            // Index for faster lookups
            $table->index('email');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};


