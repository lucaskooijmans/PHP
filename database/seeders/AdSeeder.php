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
            'title' => 'Chickens for rent',
            'description' => 'I rent out my god damn chickens',
            'price' => 10,
            'postalcode' => '1234AB',
            'user_id' => 3,
            'category_id' => 4,
            'type_id' => 2,
            'business_id' => 1,
        ]);
        Ad::create([
            'title' => 'Car for rent',
            'description' => 'I rent out my Mercedes',
            'price' => 1000,
            'postalcode' => '1235AB',
            'user_id' => 2,
            'category_id' => 1,
            'type_id' => 2,
        ]);
        Ad::create([
            'title' => 'Ugly baby for sale',
            'description' => 'Dont need this baby in my life',
            'price' => 1,
            'postalcode' => '1236AB',
            'user_id' => 2,
            'category_id' => 4,
            'type_id' => 1,
        ]);
        Ad::create([
            'title' => 'Pig for sale',
            'description' => 'Cool pig for sale, tastes good you know',
            'price' => 15,
            'postalcode' => '1236AB',
            'user_id' => 2,
            'category_id' => 4,
            'type_id' => 1,
        ]);
        Ad::create([
            'title' => 'Chainsaw',
            'description' => 'It works and dont need it anymore',
            'price' => 115,
            'postalcode' => '1236AB',
            'user_id' => 2,
            'category_id' => 2,
            'type_id' => 1,
        ]);
        Ad::create([
            'title' => 'Ford F150',
            'description' => 'America. Rent price per day..',
            'price' => 5000,
            'postalcode' => '1236AB',
            'user_id' => 3,
            'category_id' => 4,
            'type_id' => 2,
        ]);
    }
}
