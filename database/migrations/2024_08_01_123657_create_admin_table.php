<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;


return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('fulln');
            $table->string('schname');
            $table->string('admail');
            $table->string('logo');
            $table->string('addy');
            $table->string('hemal');
            $table->string('hpazz');
            $table->string('fon');
            $table->string('role');
            $table->string('skid');
            $table->string('dreg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin');
    }
};
