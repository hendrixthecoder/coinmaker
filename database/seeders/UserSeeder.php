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
            'number' => '09035039339'
        ]);
        
        User::create([
            'first_name' => 'Patrick',
            'last_name' => 'Bateman',
            'country' => 'America',
            'email' => 'pb@gmail.com',
            'password' => Hash::make('Coldwrld9'),
            'number' => '09035039339'
        ]);
        
        User::create([
            'first_name' => 'Elon',
            'last_name' => 'Musk',
            'country' => 'Pluto',
            'email' => 'elonmusk@gmail.com',
            'password' => Hash::make('Coldwrld9'),
            'number' => '09035039339'
        ]);
        
        User::create([
            'first_name' => 'Elon',
            'last_name' => 'Factory',
            'country' => 'Pluto',
            'email' => 'factoryboy@gmail.com',
            'password' => Hash::make('Coldwrld9'),
            'number' => '09035039339'
        ]);
        
        User::create([
            'first_name' => 'Elon',
            'last_name' => 'Industry',
            'country' => 'Pluto',
            'email' => 'akara@gmail.com',
            'password' => Hash::make('Coldwrld9'),
            'number' => '09035039339'
        ]);
        
        User::create([
            'first_name' => 'Plut',
            'last_name' => 'Factory',
            'country' => 'Pluto',
            'email' => 'plutokid@gmail.com',
            'password' => Hash::make('Coldwrld9'),
            'number' => '09035039339'
        ]);

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Johnbull',
            'country' => 'Nigeria',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Coldwrld9'),
            'number' => '09035039339'
        ]);

        $admin->role_id = 2;
        $admin->save();
        
    }
}