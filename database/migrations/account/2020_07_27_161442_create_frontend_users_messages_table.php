<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendUsersMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_users_messages', function (Blueprint $table) {
            $table->id();
            $table->integer('users_id')->nullable();
            $table->integer('managers_id')->nullable();
            $table->text('message')->nullable();
            $table->text('source')->nullable();
            $table->text('lang')->nullable();
            $table->timestamp   ('read_at')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->text('user_agent')->nullable();
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
        Schema::dropIfExists('frontend_users_messages');
    }
}
