<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNovaposhtaCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novaposhta_cities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Description',1000)->nullable();
            $table->string('DescriptionRu',1000)->nullable();
            $table->string('Ref',1000)->nullable();
            $table->boolean('Delivery1')->default(0);
            $table->boolean('Delivery2')->default(0);
            $table->boolean('Delivery3')->default(0);
            $table->boolean('Delivery4')->default(0);
            $table->boolean('Delivery5')->default(0);
            $table->boolean('Delivery6')->default(0);
            $table->boolean('Delivery7')->default(0);
            $table->string('Area',1000)->nullable();
            $table->string('SettlementType',1000)->nullable();
            $table->string('IsBranch')->nullable();
            $table->string('PreventEntryNewStreetsUser',1000)->nullable();
            $table->string('Conglomerates',1000)->nullable();
            $table->integer('CityID')->nullable();
            $table->string('SettlementTypeDescriptionRu')->nullable();
            $table->string('SettlementTypeDescription')->nullable();


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
        Schema::dropIfExists('novaposhta_cities');
    }
}
