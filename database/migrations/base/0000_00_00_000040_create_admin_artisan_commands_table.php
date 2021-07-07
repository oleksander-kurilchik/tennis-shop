<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminArtisanCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_artisan_commands_table', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('command');
            $table->text('description')->nullable();
            $table->integer('order')->default(0);
//            $table->boolean('published')->default(false);
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
        Schema::dropIfExists('admin_artisan_commands_table');
    }
}
