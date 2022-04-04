<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_picture')->insert([
            'product_id' => 1,
            'picture_id' => 1
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 2,
            'picture_id' => 2
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 3,
            'picture_id' => 3
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 4,
            'picture_id' => 9
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 5,
            'picture_id' => 10
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 6,
            'picture_id' => 11
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 7,
            'picture_id' => 8
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 8,
            'picture_id' => 13
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 9,
            'picture_id' => 14
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 10,
            'picture_id' => 15
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 11,
            'picture_id' => 16
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 12,
            'picture_id' => 17
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 12,
            'picture_id' => 18
        ]);

        DB::table('product_picture')->insert([
            'product_id' => 12,
            'picture_id' => 19
        ]);
        
    }
}
