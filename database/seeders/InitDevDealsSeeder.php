<?php

namespace Database\Seeders;

use App\Models\Deal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InitDevDealsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Deal::factory(20)->create();
    }
}
