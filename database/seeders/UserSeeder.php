<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            User::create([
                'name' => 'Admin User',
                'username' => 'admin', // Sesuaikan dengan kebutuhan
                'email' => 'admin@example.com', // Jika email tetap diperlukan
                'password' => Hash::make('password123'), // Pastikan password di-hash
            ]);
    
            User::create([
                'name' => 'Regular User',
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('password123'),
            ]);
    
            User::create([
                'name' => 'Test User',
                'username' => 'testuser',
                'email' => 'testuser@example.com',
                'password' => Hash::make('password123'),
            ]);
    }
}
