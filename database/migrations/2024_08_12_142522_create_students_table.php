<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID column
            $table->integer('classid'); // Class ID (as integer)
            $table->string('sname'); // Student's name
            $table->string('onames'); // Other names (if applicable)
            $table->string('addy'); // Address
            $table->date('dob'); // Date of birth
            $table->string('parentno'); // Phone number
            $table->string('parentname'); // Parent's name
            $table->string('ppass')->nullable(); // Parent's password (nullable)
            $table->timestamps(); // Created at and updated at timestamps

            // Note: No foreign key constraint
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
}



