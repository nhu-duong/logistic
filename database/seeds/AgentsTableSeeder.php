<?php

use Illuminate\Database\Seeder;

class AgentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('agents')->insert([[
            'name' => 'Agent 1',
            'address' => '304/31 Huong Lo 80, Binh Tan, HCMC',
            'city' => 'Saigon',
            'country' => 'Vietnam',
            'phone' => '0987123456',
            'email' => 'agent1@logistic.local',
        ], [
            'name' => 'Agent 2',
            'address' => '304/41 Huong Lo 80, Binh Tan, HCMC',
            'city' => 'Ha Noi',
            'country' => 'Vietnam',
            'phone' => '0987123452',
            'email' => 'agent2@logistic.local',
        ]]);
    }
}
