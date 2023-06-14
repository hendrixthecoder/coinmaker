<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Biobele',
            'last_name' => 'Johnbull',
            'country' => 'Nigeria',
            'email' => 'biobeledev@gmail.com',
            'password' => Hash::make('Coldwrld9'),
        ]);

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Johnbull',
            'country' => 'Nigeria',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Coldwrld9'),
        ]);

        $admin->role_id = 2;
        $admin->save();
        
    }
}