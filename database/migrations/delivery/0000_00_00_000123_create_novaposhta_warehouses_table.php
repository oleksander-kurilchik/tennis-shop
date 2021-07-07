<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovaposhtaWarehousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novaposhta_warehouses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Ref')->nullable();
            $table->string('SiteKey')->nullable();
            $table->string('Description')->nullable();
            $table->string('DescriptionRu')->nullable();
            $table->string('TypeOfWarehouse')->nullable();
            $table->string('Number')->nullable();
            $table->string('CityRef')->nullable();
            $table->string('CityDescription')->nullable();
            $table->string('CityDescriptionRu')->nullable();
            $table->string('Longitude')->nullable();
            $table->string('Latitude')->nullable();
            $table->string('PostFinance')->nullable();
            $table->string('POSTerminal')->nullable();
            $table->integer('InternationalShipping')->nullable();
            $table->integer('TotalMaxWeightAllowed')->nullable();
            $table->integer('PlaceMaxWeightAllowed')->nullable();
            $table->text('Reception')->nullable();
            $table->text('Delivery')->nullable();
            $table->text('Schedule')->nullable();
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
        Schema::dropIfExists('novaposhta_warehouses');
    }
}
