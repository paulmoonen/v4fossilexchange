<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'Charles Darwin',
            'email'         => 'admin@fossilexchange.nl',
            'password'      => bcrypt('mypassword'),
            'role'          => 1, //admin user customer
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('users')->insert([
            'name'          => 'Bob',
            'email'         => 'bob@fossilexchange.nl',
            'password'      => bcrypt('mypassword'),
            'street'        => 'Klapbrugweg',
            'housenumber'   => '23-a',
            'postal_code'   => '1234AB',
            'city'          => 'Roelofarendsveen',
            'country'       => 'Nederland',
            'role'          => 2, //registered customer
            'created_by'    => 1,
            'created_at'    => now()
        ]);

        DB::table('users')->insert([
            'name'          => 'Ada',
            'email'         => 'ada@fossilexchange.nl',
            'password'      => bcrypt('mypassword'),
            'street'        => 'Devon Street',
            'housenumber'   => '22 bis',
            'postal_code'   => '1234AB',
            'city'          => 'Dublin',
            'country'       => 'Ireland',
            'role'          => 2, //registered customer
            'created_by'    => 1,
            'created_at'    => now()
        ]);
    }
}
