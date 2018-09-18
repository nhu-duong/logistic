<?php

use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('address')->insert([[
            'name' => 'Galliker Buyer',
            'short_name' => 'GLB',
            'address' => '304/21 Huong Lo 80, Binh Tan, HCMC',
            'email' => 'galliker@logistic.local',
            'phone' => '0987123456',
            'fax' => '0978456123',
            'is_buyer' => 1,
            'is_seller' => 0,
            'is_agent' => 0,
        ], [
            'name' => 'Galliker Seller',
            'short_name' => 'GLS',
            'address' => '44 Street 144, Tan Phu Ward, District 9, HCMC',
            'email' => 'galliker_seller@logistic.local',
            'phone' => '0987123456',
            'fax' => '0978456123',
            'is_buyer' => 0,
            'is_seller' => 1,
            'is_agent' => 0,
        ], [
            'name' => 'Galliker Agent',
            'short_name' => 'GLA',
            'address' => '171 ap 5, Son Phu, Ben Tre',
            'email' => 'galliker_agent@logistic.local',
            'phone' => '0987123456',
            'fax' => '0978456123',
            'is_buyer' => 0,
            'is_seller' => 0,
            'is_agent' => 1,
        ]]);
    }
}
