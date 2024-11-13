<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ],
            [
                'name' => 'Approver 1',
                'email' => 'approver1@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'level1',
            ],
            [
                'name' => 'Approver 2',
                'email' => 'approver2@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'level2',
            ],
        ]);
    }
}
