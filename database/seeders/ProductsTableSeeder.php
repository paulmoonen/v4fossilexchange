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
            'description'   => 'Ammonite fragment with distinct, fractal-like surface pattern',
            'picture'       => 'ammoniet1.jpg',
            'price'         => 1.23,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0 //seeding    
        ]);

        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 3,
            'description'   => 'Ammonite fragment with distinct radial surface ribs',
            'picture'       => 'ammoniet2.jpg',
            'price'         => 2.00,
            'stock'         => 5,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 3,
            'description'   => 'Ammonite, worn surface',
            'picture'       => 'ammoniet3.jpg',
            'price'         => 3.25,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 2,
            'description'   => 'Brachiopods with smooth, undulating edges',
            'picture'       => 'brachiopoden1.jpg',
            'price'         => 1.23,
            'stock'         => 10,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 2,
            'description'   => 'Brachiopods with surface ribs',
            'picture'       => 'brachiopoden2.jpg',
            'price'         => 1.32,
            'stock'         => 12,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 4,
            'description'   => 'Brachiopods from white chalk rock',
            'picture'       => 'brachiopoden3.jpg',
            'price'         => 1.35,
            'stock'         => 5,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 5,
            'description'   => 'Single Brachiopod shell, the Dutch call this suikerschepje (sugar spoon )',
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
            'description'   => 'Fern fossil in slate rock',
            'picture'       => 'plant1.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 1,
            'description'   => 'Fern fossil in slate rock',
            'picture'       => 'plant2.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 1,
            'description'   => 'Fern fossil in slate rock',
            'picture'       => 'plant3.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'sea urchin',
            'originsite'    => 6,
            'description'   => 'Sea urchin fragment in white chalk rock',
            'picture'       => 'zee-egel.jpg',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);
    }
}
