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
        $user = User::create([
            'name' => 'admin',
            'age' => 17,
            'gender' => 'Pria',
            'blood_type' => 'A',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'admin', // password
        ]);
        $user->assignRole('admin');
    }
}
