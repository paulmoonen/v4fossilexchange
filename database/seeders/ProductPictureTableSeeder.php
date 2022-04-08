<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductPictureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_picture')->insert([
            'product_id'           => 1,
            'picture_id'           => 1,
            'created_by'           => 0  //machine 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 2,
            'picture_id'           => 2,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 3,
            'picture_id'           => 3,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 4,
            'picture_id'           => 9,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 5,
            'picture_id'           => 10,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 6,
            'picture_id'           => 11,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 7,
            'picture_id'           => 8,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 8,
            'picture_id'           => 13,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 9,
            'picture_id'           => 14,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 10,
            'picture_id'           => 15,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 11,
            'picture_id'           => 16,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 12,
            'picture_id'           => 5,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 12,
            'picture_id'           => 6,
            'created_by'           => 0 
        ]);

        DB::table('product_picture')->insert([
            'product_id'           => 12,
            'picture_id'           => 7,
            'created_by'           => 0 
        ]);
    }
}
