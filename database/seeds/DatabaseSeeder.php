<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $this->call(UsersTableSeeder::class);
//        $this->call(AddressTableSeeder::class);
//        $this->call(AgentsTableSeeder::class);
//        $this->call(PortsTableSeeder::class);
//        $this->call(ShipsTableSeeder::class);
//        $this->call(ItemsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
    }
}
