<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OriginsitesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('originsites')->insert([
            'site_name'             => "no geological site of origin applies to this product itself",
            'site_description'      => "This product may not be a fossil or anything geological, or the origin site is unknown.",
            'country'               => 5,
            'created_at'            => now(),
            'created_by'            => 1
        ]);

        DB::table('originsites')->insert([
            'site_name'             => "Piesberg, Osnabrück",
            'site_description'      => "A huge open air mine. Visitors are welcome to recreate around the mine and climb the hill. On top of the hill the mining company regularly deposits a pile of slate debris which is rich in plant fossils, like fern or ginko trea leafs.",
            'country'               => 5,
            'created_at'            => now(),
            'created_by'            => 1
        ]);

        DB::table('originsites')->insert([
            'site_name'             => "Lion-sur-Mer",
            'site_description'      => "At low tide you can walk on the seafloor and collect brachiopods",
            'country'               => 1,
            'created_at'            => now(),
            'created_by'            => 1
        ]);

        DB::table('originsites')->insert([
            'site_name'             => "Le Houlgate / Les Vaches Noires",
            'site_description'      => "Ammonites and bivalves. Lovely town with a paleontology museum.",
            'country'               => 1,
            'created_at'            => now(),
            'created_by'            => 1
        ]);

        DB::table('originsites')->insert([
            'site_name'             => "Le Tréport",
            'site_description'      => "White chalk cliffs. Wait for low tide: walk the seafloor and avoid the crumbling cliffs.",
            'country'               => 1,
            'created_at'            => now(),
            'created_by'            => 1
        ]);

        DB::table('originsites')->insert([
            'site_name'             => "Borssele",
            'site_description'      => "Beach of the Westerschelde, look for brachiopods",
            'country'               => 4,
            'created_at'            => now(),
            'created_by'            => 1
        ]);

        DB::table('originsites')->insert([
            'site_name'             => "Hillerslev",
            'site_description'      => "Open air chalk mine: no cliffs but open field. Look for sea urchins.",
            'country'               => 3,
            'created_at'            => now(),
            'created_by'            => 1
        ]);

        DB::table('originsites')->insert([
            'site_name'             => "Rheine",
            'site_description'      => "Open air limestone mine. No entrance, but surrounding farm fields in january ( no crops yet ) are rich in stones broken up by plowing.",
            'country'               => 5,
            'created_at'            => now(),
            'created_by'            => 1
        ]);
    }
}
