<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdmin = User::create([
            'fullname' => 'Super Admin',
            'username' => 'testingSA',
            'email' => 'testingSuperA@gmail.com',
            'password' => bcrypt('jajaSA')
        ]);

        $superAdmin -> assignRole('superAdmin');

        $admin = User::create([
            'fullname' => 'Admin',
            'username' => 'testingAdmin',
            'email' => 'testingAdmin@gmail.com',
            'password' => bcrypt('jajaAdmin')
        ]);

        $admin -> assignRole('admin');
    }
}
