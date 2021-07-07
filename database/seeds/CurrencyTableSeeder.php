<?php

use Illuminate\Database\Seeder;

class CurrencyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('currencies')->insert([
            'name' => "Гривня",
            'title' => "UAH",
            "code"=>"uah",
            'is_default' => true,
        ]);

    }
}
