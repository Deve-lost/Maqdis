<?php

use Illuminate\Database\Seeder;
use App\Program;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Program::create([
       	'nm_program' => 'Ihsan',
       	'deskripsi' => 'Program belajar membaca Al-Quran dari dasar dengan target menjadi pembaca Al-Quran yang lancar, baik dan benar'
       ]);

       Program::create([
       	'nm_program' => 'Tahsin',
       	'deskripsi' => 'Program memperbaiki bacaan Al-Quran dengan target menjadi guru Al-Quran yang produktif'
       ]);

       Program::create([
       	'nm_program' => 'Tahfizh',
       	'deskripsi' => 'Program menghafal Al-Quran'
       ]);

       Program::create([
       	'nm_program' => 'Maqomat (Irama)',
       	'deskripsi' => 'Program memperindah bacaan Al-Quran'
       ]);

       Program::create([
       	'nm_program' => 'Bahasa Arabqu',
       	'deskripsi' => 'Program bimbingan bahasa arab untuk menerjemahkan Al-Quran'
       ]);

       Program::create([
       	'nm_program' => 'TakTik',
       	'deskripsi' => 'Program Tafsir kajian tematik'
       ]);

       Program::create([
       	'nm_program' => 'Ta-Mat Al-Jazary',
       	'deskripsi' => 'Program Talaqi Matan Al-Jazary'
       ]);

       Program::create([
       	'nm_program' => 'Mahir Membaca Mushaf Madinah',
       	'deskripsi' => 'Program penguasaan tanda-tanda baca dalam mushaf madinah'
       ]);
    }
}
