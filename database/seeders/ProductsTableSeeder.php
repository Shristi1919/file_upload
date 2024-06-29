<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Clear the table first
        DB::table('products')->truncate();

        // Insert the data
        DB::table('products')->insert([
            [
                'id' => 1,
                'name' => 'Product 1',
                'description' => 'This is Description for Product 1.',
                'price' => 5000.00,
                'stock' => 50,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Product 2',
                'description' => 'This is Description for Product 2.',
                'price' => 2000.00,
                'stock' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
