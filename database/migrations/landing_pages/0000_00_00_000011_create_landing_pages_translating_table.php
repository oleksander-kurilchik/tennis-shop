<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingPagesTranslatingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages_translating', function (Blueprint $table) {
            $table->id();
            $table->integer('landing_pages_id');
            $table->integer('languages_id');
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->text('seo_text')->nullable();
            $table->index(['landing_pages_id', 'languages_id'], 'lpt_index_page_lang');
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
        Schema::dropIfExists('landing_pages_translating');
    }
}
