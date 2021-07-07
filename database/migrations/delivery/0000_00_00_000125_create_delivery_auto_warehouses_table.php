<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAutoWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_auto_warehouses', function (Blueprint $table) {
            $table->string('id')->nullable();
            $table->string('name')->nullable();
            $table->string('CityId')->nullable();
            $table->string('address')->nullable();
            $table->string('operatingTime')->nullable();
            $table->string('Phone')->nullable();
            $table->string('EmailStorage')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Office')->nullable();
            $table->string('CityName')->nullable();
            $table->boolean('IsWarehouse')->nullable();
            $table->string('RcPhoneSecurity')->nullable();
            $table->string('RcPhoneManagers')->nullable();
            $table->string('RcPhone')->nullable();
            $table->string('RcName')->nullable();
            $table->string('WarehouseForDeliveryId')->nullable();
            $table->string('WarehouseType')->nullable();
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
        Schema::dropIfExists('delivery_auto_warehouses');
    }
}
