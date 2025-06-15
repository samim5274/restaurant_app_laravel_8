<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('tableId');
            $table->unsignedBigInteger('cartId');
            $table->integer('quantity')->default(1);
            $table->decimal('price', 8, 2)->nullable(); // Single item price
            $table->decimal('total', 10, 2)->nullable(); // price * quantity
            $table->tinyInteger('status')->default(0); // 0 = pending
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
        Schema::dropIfExists('orders');
    }
}
