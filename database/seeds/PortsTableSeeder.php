<?php

use Illuminate\Database\Seeder;

class PortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ports')->insert([
            [
                'name' => 'Cat Lai',
                'address' => '20 Mai Chi Tho, District 2',
            ], 
            [
                'name' => 'Tan Cang',
                'address' => '30 AH1, District 9',
            ]
        ]);
    }
}
