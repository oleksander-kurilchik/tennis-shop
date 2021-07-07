<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBackendUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backend_users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->collation('utf8_unicode_ci');
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('super_user')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('backend_users');
    }
}
