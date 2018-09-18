<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            [
                'name' => 'Chair 1',
                'short_name' => 'CH1',
            ],
            [
                'name' => 'Table 1',
                'short_name' => 'TB1',
            ]
        ]);
    }
}
