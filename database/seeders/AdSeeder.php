<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ad::create([
            'title' => 'Kippen te huur',
            'description' => 'Ik verhuur mijn kippen',
            'price' => 10,
            'postalcode' => '1234AB',
            'user_id' => 1,
            'category_id' => 1,
            'type_id' => 2,
            'business_id' => 1,
        ]);
        Ad::create([
            'title' => 'Auto te huur',
            'description' => 'Ik verhuur mn merrie',
            'price' => 1000,
            'postalcode' => '1235AB',
            'user_id' => 2,
            'category_id' => 1,
            'type_id' => 2,
        ]);
        Ad::create([
            'title' => 'Vespa te koop',
            'description' => 'Ik verkoop mijn full-option vespa',
            'price' => 1500,
            'postalcode' => '1236AB',
            'user_id' => 3,
            'category_id' => 3,
            'type_id' => 1,
        ]);
    }
}
