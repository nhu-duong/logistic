<?php

use Illuminate\Database\Seeder;

class ShipsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ships')->insert([
            [
                'name' => 'USS Ronald Reagan',
            ],
            [
                'name' => 'Titanic',
            ],
        ]);
    }
}
