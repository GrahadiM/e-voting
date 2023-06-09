<?php

namespace Database\Seeders;

use App\Models\Vote;
use Illuminate\Database\Seeder;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $lat    = '-6.218081231433051';
        // $long   = '-6.218081231433051';
        $lat    = '-6.2087634';
        $long   = '106.845599';

        Vote::create([
            'kandidat_id' => 1,
            'pemilih_id'  => 2,
            'lat'         => $lat,
            'long'        => $long,
        ]);

        Vote::create([
            'kandidat_id' => 2,
            'pemilih_id'  => 3,
            'lat'         => $lat,
            'long'        => $long,
        ]);

        Vote::create([
            'kandidat_id' => 1,
            'pemilih_id'  => 4,
            'lat'         => $lat,
            'long'        => $long,
        ]);
    }
}
