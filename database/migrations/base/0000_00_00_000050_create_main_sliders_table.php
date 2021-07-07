<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMainSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('main_sliders', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Only for admin panel');
            $table->text('title')->nullable();
            $table->string('image_name')->nullable();
            $table->string('image_name_sm')->nullable();
            $table->text('description')->nullable();
            $table->text('url_text')->nullable();
            $table->string('url')->nullable();
            $table->boolean('published')->default(0);
            $table->integer('order')->default(0);
            $table->integer('languages_id')->nullable();
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
        Schema::drop('main_sliders');
    }
}
