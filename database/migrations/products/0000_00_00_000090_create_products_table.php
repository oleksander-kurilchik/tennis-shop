<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('order')      ->default(0);
            $table->string('slug',1000) ->unique()->collation('utf8_unicode_ci');
            $table->string('vendor_code')   ->unique()->comment('erp');
            $table->integer('quantity')     ->default(0);
            $table->boolean('published')    ->default(0);
            $table->decimal('price')        ->default(0);
            $table->decimal('old_price')    ->default(0);
            $table->integer('currencies_id')->nullable();
            $table->integer('vendors_id')   ->nullable();
            $table->boolean('sale')         ->default(0);
            $table->boolean('new')          ->default(0);
            $table->boolean('top')          ->default(0);
            $table->boolean('under_the_order')->default(0);
            $table->boolean('available')    ->default(0);
            $table->integer('categories_id')->default(0);
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
        Schema::dropIfExists('products');
    }
}
