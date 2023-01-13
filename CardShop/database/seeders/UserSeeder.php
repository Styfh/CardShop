<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Styfhon',
                'email' => 'stefan.senjaya145@gmail.com',
                'password' => bcrypt('password'),
                'address' => 'gayStreet',
                'profile_picture' => 'stefan.senjaya145@gmail.com.png'
            ],
        ]);
    }
}
