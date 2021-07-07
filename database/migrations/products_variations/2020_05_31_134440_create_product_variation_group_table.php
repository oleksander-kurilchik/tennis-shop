<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variation_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('products_id');
            $table->string('type',255)->nullable();
            $table->string('name',255)->nullable();
            $table->text('title')->nullable();
            $table->integer('order')->default(0);
            $table->text('description')->nullable();
            $table->boolean('published')->default(false);
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
        Schema::dropIfExists('product_variation_groups');
    }
}
