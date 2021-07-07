<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders_delivery', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('orders_id');
            $table->enum('delivery_method',['self-pickup','nova-poshta','delivery','courier','justin','meest-express'])->nullable();

            $table->string('city_id')->nullable();
            $table->string('city_name')->nullable();

            $table->string('warehouse_id')->nullable();
            $table->string('warehouse_name')->nullable();
            $table->text('comment')->nullable();

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
        Schema::dropIfExists('orders_delivery');
    }
}
