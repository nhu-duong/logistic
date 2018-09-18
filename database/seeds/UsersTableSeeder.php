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
            'phone' => '0987123456',
            'email' => 'admin@logistic.local',
            'password' => bcrypt('secret'),
            'is_active' => 1,
        ]);
    }
}
