<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
            'name' => 'Українська',
            'value' => 'uk',
            'code' => 'uk',
            'is_default' => true,
        ]);
        DB::table('languages')->insert([
            'name' => 'Російська',
            'value' => 'ru',
            'code' => 'ru',
            'is_default' => false,
        ]);
      /*  DB::table('languages')->insert([
            'name' => 'Англійська',
            'value' => 'en',
            'code' => 'en',
            'is_default' => false,
        ]);*/

    }
}
