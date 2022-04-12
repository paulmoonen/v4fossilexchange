<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert([
            'name'          => 'France',      
            'description'   => ''
        ]);

        DB::table('countries')->insert([
            'name'          => "Belgium",
            'description'   => ''
        ]);

        DB::table('countries')->insert([
            'name'          => "Denmark",
            'description'   => "Laws apply for scientifically significant finds of fossils, and meteorites. Reda int these Danekrae rules before you plan your own expedition. "
        ]);
        DB::table('countries')->insert([
            'name'          => "Holland",
            'description'   => ''
        ]);
        DB::table('countries')->insert([
            'name'          => "Germany",
            'description'   => ''
        ]);

        DB::table('countries')->insert([
            'name'          => "No country",
            'description'   => ''
        ]);


    }
}
