<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sale_details')->insert([
            // Sale 1
            [
                'sale_id' => 1,
                'product_id' => 1,
                'service_id' => null,
                'unit_price' => 20.00,
                'quantity' => 2,
                'total' => 40.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 1,
                'product_id' => null,
                'service_id' => 1,
                'unit_price' => 10.00,
                'quantity' => 1,
                'total' => 10.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Sale 2
            [
                'sale_id' => 2,
                'product_id' => 2,
                'service_id' => null,
                'unit_price' => 50.00,
                'quantity' => 2,
                'total' => 100.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 2,
                'product_id' => null,
                'service_id' => 2,
                'unit_price' => 40.00,
                'quantity' => 1,
                'total' => 40.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Sale 3
            [
                'sale_id' => 3,
                'product_id' => 3,
                'service_id' => null,
                'unit_price' => 25.00,
                'quantity' => 3,
                'total' => 75.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 3,
                'product_id' => null,
                'service_id' => 2,
                'unit_price' => 0.00, // No additional service
                'quantity' => 0,
                'total' => 0.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Sale 4
            [
                'sale_id' => 4,
                'product_id' => 4,
                'service_id' => null,
                'unit_price' => 30.00,
                'quantity' => 2,
                'total' => 60.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 4,
                'product_id' => null,
                'service_id' => 1,
                'unit_price' => 15.00,
                'quantity' => 1,
                'total' => 15.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Sale 5
            [
                'sale_id' => 5,
                'product_id' => 5,
                'service_id' => null,
                'unit_price' => 100.00,
                'quantity' => 1,
                'total' => 100.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'sale_id' => 5,
                'product_id' => null,
                'service_id' => 1,
                'unit_price' => 80.00,
                'quantity' => 1,
                'total' => 80.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
