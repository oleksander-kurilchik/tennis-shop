<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAutoCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_auto_cities', function (Blueprint $table) {
            $table->string('id',1000)->nullable();
            $table->string('name',1000)->nullable();
            $table->string('RegionId',1000)->nullable();
            $table->boolean('IsWarehouse')->nullable();
            $table->boolean('ExtracityPickup')->nullable();
            $table->boolean('ExtracityShipping')->nullable();
            $table->boolean('RAP')->nullable();
            $table->boolean('RAS')->nullable();
            $table->string('regionName',1000)->nullable();
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
        Schema::dropIfExists('delivery_auto_cities');
    }
}
