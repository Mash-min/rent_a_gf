<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
      	'firstname' => 'Mashiyyat',
      	'lastname' => 'Delos Santos',
        'image' => 'no-image.jpg',
      	'email' => 'delossantos.mash@gmail.com',
        'contact' => '09270118376',
        'address' => 'City of San Jose del Monte Bulacan',
        'bio' => 'NO BIO',
        'birthdate' => now(),
      	'password' => Hash::make('11111111'),
        'role' => 'admin'
      ]);
    }
}
