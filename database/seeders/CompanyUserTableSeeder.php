<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\User;

class CompanyUserTableSeeder extends Seeder
{
    public function run()
    {
        $user1 = User::where('email', 'user1@example.com')->first();
        $user2 = User::where('email', 'user2@example.com')->first();
        $user3 = User::where('email', 'user3@example.com')->first();

        $companyA = Company::where('name', 'Company A')->first();
        $companyB = Company::where('name', 'Company B')->first();
        $companyC = Company::where('name', 'Company C')->first();

        $user1->companies()->attach($companyA->id, ['connected_at' => now()]);
        $user1->companies()->attach($companyC->id, ['connected_at' => now()]);
        $user2->companies()->attach($companyB->id, ['connected_at' => now()]);
        $user3->companies()->attach($companyA->id, ['connected_at' => now()]);
    }
}

