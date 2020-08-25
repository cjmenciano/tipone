<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'password',
            'type' => User::ADMIN_TYPE
        ]);

        DB::table('users')->insert([
            'name' => 'Clifford John',
            'email' => 'cjmenciano@admin.com',
            'password' => '123',
            'type' => User::DEFAULT_TYPE
        ]);
    }
}
