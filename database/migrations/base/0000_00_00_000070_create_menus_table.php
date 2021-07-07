<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable()->comment('Only for admin panel');
            $table->string('slug')->unique()->collation('utf8_unicode_ci');
            $table->boolean('is_deletable')->default(false);
            $table->boolean('is_editable')->default(false);
            $table->timestamps();
        });

        Schema::create('menu_items', function (Blueprint $table) {
            $languages = config('deploy.languages');
            $table->id();
            $table->string('name')->comment('For admin panel only');
            $table->unsignedInteger('menu_id')->nullable();
            $table->enum('target', ['_blank', '_self', '_parent', '_top'])->default('_self');
            $table->integer('parent_id')->nullable();
            $table->integer('order')->default(0);
            foreach ($languages as $language) {
                $table->string('title_'.strtolower($language['code']), 1000)->nullable();
            }
            foreach ($languages as $language) {
                $table->string('url_'.strtolower($language['code']), 1000)->nullable();
            }
            $table->boolean('published')->default(0);
            $table->string('image_name', 1000)->nullable();
            $table->string('route')->nullable()->default(null);
            $table->text('parameters')->nullable()->default(null);
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
        Schema::drop('menu_items');
        Schema::drop('menus');
    }
}
