<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandingPageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('landing_pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Only for admin panel');
            $table->string('slug')->unique()->collation('utf8_unicode_ci');
            $table->text('classes')->nullable();
            $table->boolean('published')->default(false);
            $table->boolean('deletable')->default(true);
            $table->boolean('editable_slug')->default(true);
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
        Schema::dropIfExists('landings_page');
    }
}
