<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PicturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'ammoniet1.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'ammoniet2.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'ammoniet3.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'ammonite_crystals.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'ammonite1_de.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'ammonite2_de.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'ammonite3_de.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'brachiopod_borssele.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'brachiopoden1.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'brachiopoden2.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'brachiopoden3.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'krijtrotsen.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'plant1.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'plant2.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'plant3.jpg'
        ]);

        DB::table('pictures')->insert([
            'created_at'    => now(),
            'created_by'    => 0, //machine
            'name'          => 'zee-egel.jpg'
        ]);
    }
}
