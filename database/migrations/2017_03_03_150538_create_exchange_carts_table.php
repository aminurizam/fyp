<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExchangeCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exchange_carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('seller_id')->nullable();
            $table->integer('product_id');
            $table->string('image');
            $table->text('details');
            $table->enum('statusExchange',['confirmed,rejected'])->nullable();
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
        Schema::dropIfExists('exchange_carts');
    }
}
