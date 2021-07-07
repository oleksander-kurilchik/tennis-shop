<?php

use Illuminate\Database\Seeder;

class SetDefaultSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('settings_groups')->insert([
            'id' => '1',
            'name' => 'Загальні',
            'slug' => 'globals',
            'comment' => null,
            'order' => '1',
        ]);




        /**
         * Footer settings
         */
        DB::table('settings_groups')->insert([
            'id' => '2',
            'name' => 'Футер',
            'slug' => 'footer',
            'comment' => null,
            'order' => '2',
        ]);




        /**
         * Seo settings settings
         */
        DB::table('settings_groups')->insert([
            'id' => '3',
            'name' => 'Налаштування SEO',
            'slug' => 'seo',
            'comment' => null,
            'order' => '6',
        ]);


        DB::table('settings_groups')->insert([
            'id' => '4',
            'name' => 'Головна сторінка',
            'slug' => 'main_page',
            'comment' => null,
            'order' => '2',
        ]);



















    }
}
