<?php

use Illuminate\Database\Seeder;

class AdminUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('backend_users')->insert([
            'name' => 'admin',
            'email' => 'admin@tennis-shop.com.ua',
            'password' => Hash::make('111111111'),
        ]);

        DB::table('backend_users')->insert([
            'name' => 'admin2',
            'email' => 'admin2@tennis-shop.com.ua',
            'password' => Hash::make('2222222222'),
        ]);

        DB::table('backend_users')->insert([
            'name' => 'admin3',
            'email' => 'admin3@tennis-shop.com.ua',
            'password' => Hash::make('2222222222'),
        ]);
    }
}
