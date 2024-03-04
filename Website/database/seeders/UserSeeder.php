<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::factory()->create([
             'name' => 'user1',
             'email' => 'user1@example.com',
         ]);
        User::factory()->create([
            'name' => 'user2',
            'email' => 'user2@example.com',
        ]);
        User::factory()->create([
            'name' => 'user3',
            'email' => 'user3@example.com',
        ]);
    }
}
