<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'          => 'Brachiopod',
            'description'   => 'An ancient and by now mostly extinct group of molluscs',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'Ammonite',
            'description'   => 'Jurassic invertebrate',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'Sea Urchin',
            'description'   => 'An ancient group of creatures that is still successful and beautiful.',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'Plants',
            'description'   => 'Once they were actually green',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'Jura',
            'description'   => '190 to 136 milion years ago',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'Cretaceous',
            'description'   => '136 to 65 milion years ago',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'fossil',
            'description'   => 'Remnant or imprint of a being that lived long ago',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'Various',
            'description'   => 'Items of paleontological or geological interest',
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('categories')->insert([
            'name'          => 'Book',
            'description'   => 'Scientific literature, maps, guides and manuals',
            'created_by'    => 1,
            'created_at'    => now()
        ]);
    }
}
