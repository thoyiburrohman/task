<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Role::create([
            'name' => 'administrator',
        ]);
        Role::create([
            'name' => 'manager',
        ]);

        User::create([
            'role_id' => 1,
            'name' => 'administrator',
            'email' => 'admin@task.com',
            'password' => bcrypt('admin'),
        ]);
        User::create([
            'role_id' => 2,
            'name' => 'Manager Proyek',
            'email' => 'manage@task.com',
            'password' => bcrypt('password'),
        ]);
    }
}
