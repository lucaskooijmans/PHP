<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'user']);
        Role::create(['name' => 'private advertiser']);
        Role::create(['name' => 'business advertiser']);
        Role::create(['name' => 'platform owner']);
    }
}
