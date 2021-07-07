<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('products_id');
            $table->integer('users_id')->nullable();
            $table->integer('rating')->default(0);
            $table->string('user_name',255);
            $table->string('email',255);
            $table->text('description')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->text('user_agent')->nullable();
            $table->boolean('answered')->default(false);
            $table->timestamp('read_at')->nullable();
            $table->boolean('published')->default(false);
            $table->dateTime('date_of_sending')->nullable();
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
        Schema::dropIfExists('products_reviews');
    }
}
