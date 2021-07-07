<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->collation('utf8_unicode_ci');
            $table->text('name');
            $table->text('value')->nullable();
            $table->string('languages_id')->nullable();
            $table->string('validation_rules', 1000)->default('')->nullable();
            $table->text('comment')->nullable();
            $table->text('input_type')->nullable();
            $table->text('input_type_settings')->nullable();
            $table->integer('settings_groups_id');
            $table->integer('order')->default(0);
            $table->boolean('editable')->default(true);
            $table->boolean('deleteable')->default(false);
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
        Schema::dropIfExists('settings');
    }
}
