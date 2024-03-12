<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'car']);
        Category::create(['name' => 'motor']);
        Category::create(['name' => 'truck']);
        Category::create(['name' => 'animal']);
    }
}
