<?php

namespace Database\Seeders;

use App\Models\Datayudisium;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = User::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345')
        ]);

        User::create([
            'nama' => 'Kris',
            'username' => 'kris',
            'email' => 'kris@gmail.com',
            'password' => bcrypt('12345')
        ]);

        Datayudisium::create([
            'user_id' => $user->id,
        ]);
    }
}
