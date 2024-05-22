<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountriesTableSeeder extends Seeder
{
    public function run()
    {
        Country::create(['name' => 'Canada']);
        Country::create(['name' => 'United States']);
        Country::create(['name' => 'Mexico']);
    }
}
