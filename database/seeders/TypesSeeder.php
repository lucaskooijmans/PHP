<?php

namespace Database\Seeders;

use App\Models\AdType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdType::create(['name' => 'Buy']);
        AdType::create(['name' => 'Rent']);
    }
}
