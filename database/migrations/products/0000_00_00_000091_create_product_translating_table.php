<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTranslatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_translatings', function (Blueprint $table) {
            $table->id();
            $table->integer('products_id');
            $table->integer('languages_id');
            $table->string('title',1000);
            $table->string('short_description',3000)->nullable();
            $table->longText('description')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->longText('seo_text')->nullable();

            $table->timestamps();


            $table->index(['products_id', 'languages_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_translatings');
    }
}
