<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingPageFragmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages_fragments', function (Blueprint $table) {
            $table->id();
            $table->integer('landing_pages_id');
            $table->integer('languages_id');
            $table->string('name');
            $table->string('slug');
            $table->longText('value')->nullable();
            $table->longText('classes')->nullable();
            $table->longText('styles')->nullable();
            $table->longText('javascript')->nullable();
            $table->longText('settings')->nullable();
            $table->integer('sorting')->default(0);//Можливо видилити
            $table->boolean('published')->default(false);
            $table->timestamps();
            $table->index(['landing_pages_id', 'languages_id'], 'lpi_index_item_lang');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('landing_pages_fragments');
    }
}
