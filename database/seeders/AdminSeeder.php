<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create ([
            'name' => 'Admin Lapor Sarpras',
            'email' => 'vicki240593@gmail.com',
            'password' => bcrypt('admin12345'),

        ])->assignRole('admin');
    }
}
