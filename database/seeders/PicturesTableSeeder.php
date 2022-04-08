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
            'name'              => 'ammoniet1.jpg',
            'created_by'        => 0 //machine
        ]);

        DB::table('pictures')->insert([
            'name'              => 'ammoniet2.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'ammoniet3.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'ammonite_crystals.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'ammonite1_de.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'ammonite2_de.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'ammonite3_de.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'brachiopod_borssele.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'brachiopoden1.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'brachiopoden2.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'brachiopoden3.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'krijtroten.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'plant1.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'plant2.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'plant3.jpg',
            'created_by'        => 0 
        ]);

        DB::table('pictures')->insert([
            'name'              => 'zee-egel.jpg',
            'created_by'        => 0 
        ]);
    }
}
