<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\Country;

class CompaniesTableSeeder extends Seeder
{
    public function run()
    {
        $canada = Country::where('name', 'Canada')->first();
        $usa = Country::where('name', 'United States')->first();
        $mexico = Country::where('name', 'Mexico')->first();

        Company::create(['name' => 'Company A', 'country_id' => $canada->id]);
        Company::create(['name' => 'Company B', 'country_id' => $usa->id]);
        Company::create(['name' => 'Company C', 'country_id' => $mexico->id]);
    }
}
