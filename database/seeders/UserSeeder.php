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
        // Dummies
        User::factory()->create([
            'name' => 'Aaron',
            'email' => 'a@a.com',
            'role_id' => 1,
            'password' => Hash::make('a')
        ]);

        User::factory()->create([
            'name' => 'Bob',
            'email' => 'b@b.com',
            'role_id' => 2,
            'password' => Hash::make('b')
        ]);

        User::factory()->create([
            'name' => 'Carrol',
            'email' => 'c@c.com',
            'role_id' => 3,
            'password' => Hash::make('c')
        ]);

        // real
        User::factory()->create([
            'name' => 'The Great Platform Owner',
            'email' => 'owner@owner.com',
            'role_id' => 4,
            'password' => Hash::make('owner')
        ]);

        User::factory()->create([
            'name' => 'lucas',
            'email' => 'lucas@lucas.nl',
            'role_id' => 1,
            'password' => Hash::make('lucas')
        ]);

        User::factory()->create([
            'name' => 'pepijn',
            'email' => 'pepijn@pepijn.nl',
            'role_id' => 1,
            'password' => Hash::make('pepijn')
        ]);
    }
}
