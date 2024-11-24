<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales')->insert([
            [
                'date' => '2024-11-20',
                'time' => '14:35:00',
                'payment_method' => 1, // 1: Cash
                'status' => 1, // 1: Completed
                'customer_id' => 1,
                'subtotal' => 50.00,
                'discount' => 5.00,
                'total' => 45.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => '2024-11-21',
                'time' => '10:00:00',
                'payment_method' => 2, // 2: Yape
                'status' => 1, // 1: Completed
                'customer_id' => 2,
                'subtotal' => 150.00,
                'discount' => 10.00,
                'total' => 140.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => '2024-11-22',
                'time' => '17:45:00',
                'payment_method' => 3, // 3: Plin
                'status' => 1, // 1: Completed
                'customer_id' => 3,
                'subtotal' => 75.00,
                'discount' => 0.00,
                'total' => 75.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => '2024-11-23',
                'time' => '11:20:00',
                'payment_method' => 1, // 1: Cash
                'status' => 1, // 1: Completed
                'customer_id' => 4,
                'subtotal' => 90.00,
                'discount' => 15.00,
                'total' => 75.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'date' => '2024-11-24',
                'time' => '16:10:00',
                'payment_method' => 2, // 2: Yape
                'status' => 2, // 2: Pending
                'customer_id' => 5,
                'subtotal' => 200.00,
                'discount' => 20.00,
                'total' => 180.00,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);

    }
}
