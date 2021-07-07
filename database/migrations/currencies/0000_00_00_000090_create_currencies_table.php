<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function(Blueprint $table) {
            $table->id();
            $table->string('name')->comment("Only for admin panel");
            $table->string('title');
            $table->string('code')->nullable();
            $table->decimal('course',12,6)->default(1.0);
            $table->boolean('is_default')->default(0);
            $table->boolean("is_default_on_site")->default(false);
            $table->boolean('published')->default(0);
            $table->integer('sorting')->default(0);
            $table->integer('round')->default(2);

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
        Schema::drop('currencies');
    }
}
