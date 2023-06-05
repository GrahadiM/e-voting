<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            // dashboard
            'C-dashboard',
            'R-dashboard',
            'U-dashboard',
            'D-dashboard',

            // data-pemilih
            'C-data-pemilih',
            'R-data-pemilih',
            'U-data-pemilih',
            'D-data-pemilih',

            // data-kandidat
            'C-data-kandidat',
            'R-data-kandidat',
            'U-data-kandidat',
            'D-data-kandidat',

            // data-voting
            'C-data-voting',
            'R-data-voting',
            'U-data-voting',
            'D-data-voting',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
       }
    }
}
