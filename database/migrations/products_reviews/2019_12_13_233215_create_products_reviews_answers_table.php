<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsReviewsAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_reviews_answers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('products_reviews_id');
            $table->string('name',255);
            $table->string('user_name',255);
            $table->text('description');
            $table->date('date_answer');
            $table->boolean('published')->default(0);
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
        Schema::dropIfExists('products_reviews_answers');
    }
}
