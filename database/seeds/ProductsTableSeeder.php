<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [];
        for ($i = 1; $i < 1000; $i++) {
            $data[] = ['name' => 'Product ' . $i, 'code' => 'code_' . $i, 'status' => 0];
        }
        \Illuminate\Support\Facades\DB::table('products')->insert($data);
    }
}
