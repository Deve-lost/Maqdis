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
     		'name' => 'goahead',
     		'email' => 'developer@gmail.com',
     		'password' => bcrypt('inovindo'),
     		'alamat_lengkap' => 'Cintawana'.str_random(5).'Singaparna',
     		'no_wa' => str_random(12),
     		'tgl_lahir' => '2019-01-20'
     	]);

        User::create([
            'role' => 'Pengajar',
            'name' => 'Rahasia',
            'email' => 'rahasia@gmail.com',
            'password' => bcrypt('inovindo'),
            'alamat_lengkap' => 'Cintawana'.str_random(5).'Singaparna',
            'no_wa' => str_random(12),
            'tgl_lahir' => '2019-01-20'
        ]);

        User::create([
            'role' => 'Peserta',
            'name' => 'Inovindo',
            'email' => 'inovindo@gmail.com',
            'password' => bcrypt('inovindo'),
            'alamat_lengkap' => 'Cintawana'.str_random(5).'Singaparna',
            'no_wa' => str_random(12),
            'tgl_lahir' => '2019-01-20'
        ]);
    }
}
