<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name'              => 'Admin',
            'email'             => 'admin@test.com',
            'thumbnail'         => 'user-128x128.jpg',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);
        $roleAdmin = Role::create(['name' => 'admin']);
        $permissionsAdmin = Permission::pluck('id','id')->all();
        $roleAdmin->syncPermissions($permissionsAdmin);
        $admin->assignRole([$roleAdmin->id]);

        $user1 = User::create([
            'name'              => 'User 1',
            'nisn'              => '123456789',
            'kelas'             => 'XII',
            'jurusan'           => 'IPA A',
            'gender'            => 'Laki-laki',
            'email'             => 'user@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);

        $user2 = User::create([
            'name'              => 'User 2',
            'nisn'              => '123456789',
            'kelas'             => 'XII',
            'jurusan'           => 'IPA A',
            'gender'            => 'Laki-laki',
            'email'             => 'user2@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);

        $user3 = User::create([
            'name'              => 'User 3',
            'nisn'              => '123456789',
            'kelas'             => 'XII',
            'jurusan'           => 'IPA A',
            'gender'            => 'Laki-laki',
            'email'             => 'user3@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);

        $user4 = User::create([
            'name'              => 'User 4',
            'nisn'              => '123456789',
            'kelas'             => 'XII',
            'jurusan'           => 'IPA A',
            'gender'            => 'Laki-laki',
            'email'             => 'user4@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);

        $user5 = User::create([
            'name'              => 'User 5',
            'nisn'              => '123456789',
            'kelas'             => 'XII',
            'jurusan'           => 'IPA A',
            'gender'            => 'Laki-laki',
            'email'             => 'user5@test.com',
            'password'          => bcrypt('password'),
            'email_verified_at' => now(),
            'remember_token'    => Str::random(10),
        ]);

        $roleUser = Role::create(['name' => 'pemilih']);
        $permissions = [
            'C-dashboard',
            'R-dashboard',
            'U-dashboard',
            'D-dashboard',
        ];
        $roleUser->syncPermissions($permissions);
        $user1->assignRole([$roleUser->id]);
        $user2->assignRole([$roleUser->id]);
        $user3->assignRole([$roleUser->id]);
        $user4->assignRole([$roleUser->id]);
        $user5->assignRole([$roleUser->id]);
    }
}
