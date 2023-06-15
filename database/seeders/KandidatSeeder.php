<?php

namespace Database\Seeders;

use App\Models\Kandidat;
use Illuminate\Database\Seeder;

class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $visi = 'Kebersamaan untuk mencipatkan prestasi tanpa batas';
        $misi = '<ul>
                    <li>Kebersamaan untuk mencipatkan prestasi tanpa batas</li>
                    <li>Kebersamaan untuk mencipatkan prestasi tanpa batas</li>
                    <li>Kebersamaan untuk mencipatkan prestasi tanpa batas</li>
                </ul>';

        Kandidat::create([
            'name'      => 'Gilang Saefullah',
            'kelas'     => 'XI',
            'jurusan'   => 'IPA A',
            'jabatan'   => 'Ketua OSIS',
            'photo'     => 'candidate-icon.png',
            'visi'      => $visi,
            'misi'      => $misi,
        ]);

        Kandidat::create([
            'name'      => 'Aldin Munawar',
            'kelas'     => 'XI',
            'jurusan'   => 'IPA A',
            'jabatan'   => 'Ketua OSIS',
            'photo'     => 'candidate-icon.png',
            'visi'      => $visi,
            'misi'      => $misi,
        ]);

        Kandidat::create([
            'name'      => 'Krisna Tri Anggara',
            'kelas'     => 'XI',
            'jurusan'   => 'IPA A',
            'jabatan'   => 'Ketua OSIS',
            'photo'     => 'candidate-icon.png',
            'visi'      => $visi,
            'misi'      => $misi,
        ]);
    }
}
