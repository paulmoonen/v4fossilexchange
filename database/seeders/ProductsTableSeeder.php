<?php

namespace Database\Seeders;

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
        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 3,
            'description'   => 'fragment with distinct surface pattern',
            'picture'       => 'ammoniet1_bijgesneden.jpg',
            'price'         => 1.23,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0 //seeding    
        ]);

        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 3,
            'description'   => 'fragment with distinct surface ribs',
            'picture'       => 'ammoniet2_bijgesneden.jpg',
            'price'         => 2.00,
            'stock'         => 5,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 3,
            'description'   => 'fragment of ammonite',
            'picture'       => 'ammoniet3_bijgesneden.jpg',
            'price'         => 3.25,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 2,
            'description'   => 'fossil in white chalk rock',
            'picture'       => 'brachiopoden1_bijgesneden.jpg',
            'price'         => 1.23,
            'stock'         => 10,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 2,
            'description'   => 'fossil in white chalk rock',
            'picture'       => 'brachiopoden2_bijgesneden.jpg',
            'price'         => 1.32,
            'stock'         => 12,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 4,
            'description'   => 'fossil in white chalk rock',
            'picture'       => 'brachiopoden3_bijgesneden.jpg',
            'price'         => 1.35,
            'stock'         => 5,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 5,
            'description'   => 'beach fossil',
            'picture'       => 'brachiopod_borssele.jpg',
            'price'         => 1.00,
            'stock'         => 1,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 1,
            'description'   => 'slate fossil',
            'picture'       => 'plant1_bijgesneden.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 1,
            'description'   => 'slate fossil',
            'picture'       => 'plant2_bijgesneden.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 1,
            'description'   => 'slate fossil',
            'picture'       => 'plant3_bijgesneden.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'sea urchin',
            'originsite'    => 6,
            'description'   => 'fossil in white chalk rock',
            'picture'       => 'zee-egel.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);
    }
}
