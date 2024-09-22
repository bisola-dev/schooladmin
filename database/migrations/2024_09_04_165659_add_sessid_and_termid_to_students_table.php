<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSessidAndTermidToStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('students', function (Blueprint $table) {
            // Add new columns
            $table->string('sessid')->nullable(); // Add 'sessid' column
            $table->integer('termid')->nullable(); // Add 'termid' column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('students', function (Blueprint $table) {
            // Remove columns if rolling back
            $table->dropColumn(['sessid', 'termid']);
        });
    }
}
