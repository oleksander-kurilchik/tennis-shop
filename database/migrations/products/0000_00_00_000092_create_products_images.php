<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_images', function (Blueprint $table) {
            $table->id();
            $table->integer('products_id');
            $table->integer('order')->default(0);
            $table->string('image_name')->nullable();
            $table->boolean('logo_status')->default(false);
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->index(['products_id', 'logo_status']);
            $table->index(['order']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_images');
    }
}
