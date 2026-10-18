<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->insert([
            ['name' => 'Laptop ASUS ROG', 'price' => 12000000, 'stock' => 4],
            ['name' => 'Mouse Wireless Logitech', 'price' => 250000, 'stock' => 15],
            ['name' => 'Keyboard Mechanical', 'price' => 650000, 'stock' => 8],
            ['name' => 'Monitor 24 Inch LG', 'price' => 1800000, 'stock' => 5],
            ['name' => 'Headset Gaming RGB', 'price' => 350000, 'stock' => 10],
            ['name' => 'Flashdisk 64GB', 'price' => 95000, 'stock' => 20],
            ['name' => 'SSD Eksternal 512GB', 'price' => 850000, 'stock' => 7],
            ['name' => 'Tas Laptop Anti Air', 'price' => 200000, 'stock' => 12],
            ['name' => 'Cooling Pad Laptop', 'price' => 150000, 'stock' => 9],
            ['name' => 'Kabel HDMI 2 Meter', 'price' => 50000, 'stock' => 25],
        ]);
    }
}