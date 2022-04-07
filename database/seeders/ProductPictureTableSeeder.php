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
            'product'           => 1,
            'picture'           => 1,
            'created_by'        => 0  //machine 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 2,
            'picture'           => 2,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 3,
            'picture'           => 3,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 4,
            'picture'           => 9,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 5,
            'picture'           => 10,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 6,
            'picture'           => 11,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 7,
            'picture'           => 8,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 8,
            'picture'           => 13,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 9,
            'picture'           => 14,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 10,
            'picture'           => 15,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 11,
            'picture'           => 16,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 12,
            'picture'           => 5,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 12,
            'picture'           => 6,
            'created_by'        => 0 
        ]);

        DB::table('product_picture')->insert([
            'product'           => 12,
            'picture'           => 7,
            'created_by'        => 0 
        ]);
    }
}
