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
            $table->unsignedBigInteger('reg');
            $table->unsignedBigInteger('tableId');
            $table->unsignedInteger('total')->nullable();
            $table->unsignedInteger('discount')->nullable();
            $table->unsignedInteger('payable')->nullable();
            $table->unsignedInteger('pay')->nullable();
            $table->unsignedInteger('due')->nullable();
            $table->Integer('status')->default(0);
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
