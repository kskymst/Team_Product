<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datsales', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('date');
            $table->integer('c_id');
            $table->string('c_name');
            $table->string('c_email');
            $table->string('c_country');
            $table->string('c_postal1');
            $table->string('c_postal2');
            $table->string('c_address');
            $table->string('c_tel');
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
        Schema::dropIfExists('datsales');
    }
}
