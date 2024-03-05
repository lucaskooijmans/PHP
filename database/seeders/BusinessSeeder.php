<?php

namespace Database\Seeders;

use App\Http\Controllers\BusinessController;
use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Business::create([
            'description' => 'Wij verhuren kippen',
            'user_id' => 1,
        ]);
    }
}
