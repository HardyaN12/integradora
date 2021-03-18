<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CarritoProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carrito_producto', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('carrito_id')->unsigned()->index();
            $table->integer('producto_id')->unsigned()->index();
            $table->bigInteger('cantidad')->unsigned();
            $table->timestamps();

            $table->foreign('carrito_id')->references('id')->on('carritos');
            $table->foreign('producto_id')->references('id')->on('productos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carrito_producto');
    }
}
