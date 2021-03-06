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
            'originsite'    => 4,
            'description'   => 'Ammonite fragment with distinct, fractal-like surface pattern',
            'price'         => 1.23,
            'stock'         => 4,
            'created_by'    => 0, //seeding
            'created_at'    => now(),
            'modified_by'   => 0  //seeding    
        ]);

        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 4,
            'description'   => 'Ammonite fragment with distinct radial surface ribs',
            'price'         => 2.00,
            'stock'         => 5,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 4,
            'description'   => 'Ammonite, worn surface',
            'price'         => 3.25,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 3,
            'description'   => 'Brachiopods with smooth, undulating edges',
            'price'         => 1.23,
            'stock'         => 10,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 3,
            'description'   => 'Brachiopods with surface ribs',
            'price'         => 1.32,
            'stock'         => 12,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 5,
            'description'   => 'Brachiopods from white chalk rock',
            'price'         => 1.35,
            'stock'         => 5,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'brachiopod',
            'originsite'    => 6,
            'description'   => 'Single Brachiopod shell, the Dutch call this suikerschepje (sugar spoon )',
            'price'         => 1.00,
            'stock'         => 1,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 2,
            'description'   => 'Fern fossil in slate rock',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 2,
            'description'   => 'Fern fossil in slate rock',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'plant',
            'originsite'    => 2,
            'description'   => 'Fern fossil in slate rock',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'sea urchin',
            'originsite'    => 7,
            'description'   => 'Sea urchin fragment in white chalk rock',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);

        DB::table('products')->insert([
            'name'          => 'ammonite',
            'originsite'    => 7,
            'description'   => 'ammonite imprint in limestone',
            'price'         => 1.00,
            'stock'         => 3,
            'created_by'    => 1,
            'created_at'    => now(),
            'modified_by'   => 0    
        ]);        
    }
}
