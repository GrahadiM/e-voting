<?php

namespace Database\Seeders;

use App\Models\Jadwal;
use Illuminate\Database\Seeder;

class JadwalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jadwal::create([
            'start' => '2023-06-25 00:00:00',
            'end' => '2023-07-10 23:59:00',
        ]);
    }
}
