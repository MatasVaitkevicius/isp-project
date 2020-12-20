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
            'user_role' => 'admin',
            'created_at' => '2020-09-09 17:11:11',
        ]);
        DB::table('users')->insert([ //1
            'name' => "admin2",
            'email' => "admin2@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'admin',
            'created_at' => '2020-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ //2
            'name' => "worker",
            'email' => "worker@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'worker',
            'created_at' => '2020-09-09 17:11:11',
            'birthday' => '2020-09-09 17:11:11',
        ]);
        DB::table('users')->insert([ //2
            'name' => "worker2",
            'email' => "worker2@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'worker',
            'created_at' => '2020-09-09 17:11:11',
            'birthday' => '2020-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ //3
            'name' => "buyer",
            'email' => "buyer@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'buyer',
            'created_at' => '2020-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ //3
            'name' => "buyer2",
            'email' => "buyer2@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'buyer',
            'created_at' => '2020-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ //7
            'name' => "seller",
            'email' => "seller@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'seller',
            'created_at' => '2020-09-09 17:11:11',
        ]);

        DB::table('users')->insert([ // 8
            'name' => "seller",
            'email' => "seller2@gmail.com",
            'password' => Hash::make('123456'),
            'user_role' => 'seller',
            'created_at' => '2020-09-09 17:11:11',
        ]);

        DB::table('products')->insert([ //1
            'user_id' => '7',
            'created_at' => '2020-09-09 17:11:11',
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
            'is_confirmed' => false,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '7',
            'category' => "Electronics",
            'name' => "PS5",
            'description' => "Good ps",
            'product_condition' => "Good",
            'stock_count' => 5,
            'price' => 25.54,
            'sold_count' => 2,
            'storage_location' => "Warehouse",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => false,
            'weight' => 25.51,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '7',
            'category' => "Electronics",
            'name' => "PS5",
            'description' => "Good ps",
            'product_condition' => "Good",
            'stock_count' => 5,
            'price' => 25.54,
            'sold_count' => 2,
            'storage_location' => "Warehouse",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => false,
            'weight' => 25.51,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '8',
            'category' => "Electronics",
            'name' => "PS5X",
            'description' => "Good ps",
            'product_condition' => "Good",
            'stock_count' => 5,
            'price' => 253.54,
            'sold_count' => 2,
            'storage_location' => "House",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => false,
            'weight' => 25.51,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '8',
            'category' => "Electronics",
            'name' => "XBOX",
            'description' => "Good ps",
            'product_condition' => "Good",
            'stock_count' => 5,
            'price' => 121,
            'sold_count' => 2,
            'storage_location' => "House",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => false,
            'weight' => 25.51,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '8',
            'category' => "Furniture",
            'name' => "Desk",
            'description' => "Sturdy desk",
            'product_condition' => "Good",
            'stock_count' => 5,
            'price' => 20,
            'sold_count' => 2,
            'storage_location' => "Flat",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => true,
            'weight' => 25.51,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '8',
            'category' => "Furniture",
            'name' => "Chair",
            'description' => "Comfy chair",
            'product_condition' => "Decent",
            'stock_count' => 1,
            'price' => 20,
            'sold_count' => 1,
            'storage_location' => "Warehouse",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => true,
            'weight' => 123.54,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '8',
            'category' => "Furniture",
            'name' => "Chair",
            'description' => "Comfy chair",
            'product_condition' => "Decent",
            'stock_count' => 1,
            'price' => 20,
            'sold_count' => 1,
            'storage_location' => "Warehouse",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => true,
            'weight' => 123.54,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '7',
            'category' => "Video Games",
            'name' => "LoL",
            'description' => "Salt mines",
            'product_condition' => "Decent",
            'stock_count' => 1,
            'price' => 121,
            'sold_count' => 1,
            'storage_location' => "Warehouse",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => true,
            'weight' => 123.54,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);

        DB::table('products')->insert([ //1
            'created_at' => '2020-09-09 17:11:11',
            'user_id' => '8',
            'category' => "Video Games",
            'name' => "Dota",
            'description' => "Salt mines",
            'product_condition' => "Decent",
            'stock_count' => 1,
            'price' => 121,
            'sold_count' => 1,
            'storage_location' => "Warehouse",
            'origin' => "FR",
            'manufacture_date' => "2020-09-09",
            'warranty' => true,
            'weight' => 123.54,
            'is_confirmed' => true,
            'is_bought' => false,
        ]);
    }
}
