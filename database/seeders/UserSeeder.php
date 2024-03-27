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
             'name' => 'user1',
             'email' => 'user1@example.com',
             'role_id' => 3,
             'password' => Hash::make('user1')
         ]);

        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@example.com',
            'role_id' => 2,
            'password' => Hash::make('user2')
        ]);
        User::factory()->create([
            'name' => 'user3',
            'email' => 'user3@example.com',
            'role_id' => 1,
            'password' => Hash::make('user3')
        ]);

        // real
        User::factory()->create([
            'name' => 'lucas',
            'email' => 'lucas@lucas.nl',
            'role_id' => 1,
            'password' => Hash::make('lucas')
        ]);
    }
}
