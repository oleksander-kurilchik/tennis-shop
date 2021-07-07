<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments  ('id');
            $table->integer     ('users_id')        ->nullable();
            $table->string      ('first_name',1000)->nullable();
            $table->string      ('last_name',1000)->nullable();
            $table->string      ('email',1000)->nullable();
            $table->string      ('phone',1000)->nullable();
            $table->dateTime    ('date_order');
            $table->ipAddress   ('ip');
            $table->integer     ('total_count')->default(0);
            $table->integer     ('currency_id')->nullable();

            $table->enum('payment_method',['cod','cash','liqpay','bank_card'])->default('cash');
            $table->text        ('user_agent')      ->nullable();
            $table->boolean     ('revised')         ->default(0);
            $table->boolean     ('buy_one_click')         ->default(0);
            $table->integer     ('status' ,['new_order','being_processed','canceled','confirmed','paid','complete','returned_for_revision'])->default('new_order');
            $table->boolean     ('not_call_me')    ->default(false);
            $table->text        ('user_message')    ->nullable();
            $table->text        ('config')          ->nullable();
            $table->text        ('order_description')->nullable();
            $table->string('manager')->nullable();
//            $table->string('manager_id')->nullable();


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
        Schema::dropIfExists('orders');
    }
}
