<?php

use Illuminate\Database\Seeder;
use App\biaya_pendidikan;

class BiayaPendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        biaya_pendidikan::create([
        'jml_peserta' => '1 Orang',
        'dekat' => '350.000',
        'jauh_malam' => '400.000',
        'jauhdanmalam' => '450.000'
       ]);

        biaya_pendidikan::create([
        'jml_peserta' => '2-3 Orang',
        'dekat' => '450.000',
        'jauh_malam' => '500.000',
        'jauhdanmalam' => '550.000'
       ]);

        biaya_pendidikan::create([
        'jml_peserta' => '4-6 Orang',
        'dekat' => '500.000',
        'jauh_malam' => '550.000',
        'jauhdanmalam' => '600.000'
       ]);

        biaya_pendidikan::create([
        'jml_peserta' => '7-8 Orang',
        'dekat' => '550.000',
        'jauh_malam' => '600.000',
        'jauhdanmalam' => '650.000'
       ]);

        biaya_pendidikan::create([
        'jml_peserta' => '9-10 Orang',
        'dekat' => '600.000',
        'jauh_malam' => '650.000',
        'jauhdanmalam' => '700.000'
       ]);

    }
}
