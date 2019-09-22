<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'Admin',
            'name' => 'Goahead',
     		'email' => 'developer@gmail.com',
            'password' => bcrypt('inovindo'),
     		'avatar' => 'user.png',
     	]);

        User::create([
            'role' => 'Pengajar',
            'name' => 'Rahasia',
            'email' => 'rahasia@gmail.com',
            'password' => bcrypt('inovindo'),
            'avatar' => 'user.png',
        ]);

        User::create([
            'role' => 'Peserta',
            'name' => 'Inovindo',
            'email' => 'inovindo@gmail.com',
            'password' => bcrypt('inovindo'),
            'avatar' => 'user.png',
        ]);
    }
}
