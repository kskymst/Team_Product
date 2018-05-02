<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatsalesproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datsalesproducts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_id');
            $table->integer('pro_id');
            $table->float('pro_price');
            $table->integer('pro_quantity');
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
        Schema::dropIfExists('datsalesproducts');
    }
}
