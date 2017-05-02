<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable(); // retrieve image using the name in the folder
            $table->string('name');
            $table->float('price', 8, 2)->nullable();
            $table->enum('transactionType', ['buy', 'free', 'exchange']);
            $table->string('category');
            $table->string('changeItem')->nullable();
            $table->text('detail');
            $table->integer('seller_id')->nullable();
            $table->enum('statusItem',['pending','rejected','accepted'])->default('pending');
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
        Schema::dropIfExists('products');
    }
}
