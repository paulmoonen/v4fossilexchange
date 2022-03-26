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
            'name'          => "Piesberg, Osnabrück",
            'description'   => "A huge open air mine. Visitors are welcome to recreate around the mine and climb the hill. On top of the hill the mining company regularly deposits a pile of slate debris which is rich in plant fossils, like fern or ginko trea leafs.",
            'country'       => 5,
            'created_at'    => now(),
            'created_by'    => 1
        ]);

        DB::table('originsites')->insert([
            'name'          => "Lion-sur-Mer",
            'description'   => "At low tide you can walk on the seafloor and collect brachiopods",
            'country'       => 1,
            'created_at'    => now(),
            'created_by'    => 1
        ]);

        DB::table('originsites')->insert([
            'name'          => "Le Houlgate / Les Vaches Noires",
            'description'   => "Ammonites and bivalves. Lovely town with a paleontology museum.",
            'country'       => 1,
            'created_at'    => now(),
            'created_by'    => 1
        ]);

        DB::table('originsites')->insert([
            'name'          => "Le Tréport",
            'description'   => "White chalk cliffs. Wait for low tide: walk the seafloor and avoid the crumbling cliffs.",
            'country'       => 1,
            'created_at'    => now(),
            'created_by'    => 1
        ]);

        DB::table('originsites')->insert([
            'name'          => "Borssele",
            'description'   => "Beach of the Westerschelde, look for brachiopods",
            'country'       => 4,
            'created_at'    => now(),
            'created_by'    => 1
        ]);

        DB::table('originsites')->insert([
            'name'          => "Hillerslev",
            'description'   => "Open air chalk mine: no cliffs but open field. Look for sea urchins.",
            'country'       => 3,
            'created_at'    => now(),
            'created_by'    => 1
        ]);
    }
}
