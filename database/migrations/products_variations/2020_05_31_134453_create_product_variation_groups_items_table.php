<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariationGroupsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variation_groups_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('groups_id');
            $table->integer('products_id');
            $table->text('name')->nullable();
            $table->text('title')->nullable();
            $table->integer('order')->default(0);
            $table->text('description')->nullable();
            $table->text('value')->nullable();
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
        Schema::dropIfExists('product_variation_groups_items');
    }
}
