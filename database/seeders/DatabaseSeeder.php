<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ //1
            'name' => "admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'admin'
        ]);

        DB::table('users')->insert([ //2
            'name' => "worker",
            'email' => "worker@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'worker'
        ]);

        DB::table('users')->insert([ //3
            'name' => "buyer",
            'email' => "buyer@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'buyer'
        ]);

        DB::table('users')->insert([ //4
            'name' => "seller",
            'email' => "seller@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'seller'
        ]);

        DB::table('products')->insert([ //1
            'category' => "Electronics",
            'name' => "PC",
            'description' => "Good pc",
            'product_condition' => "Good",
            'stock_count' => 5,
            'price' => 25.54,
            'sold_count' => 2,
            'storage_location' => "Warehouse",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => false,
            'weight' => 25.51,
            'is_active' => true,
        ]);
    }
}
