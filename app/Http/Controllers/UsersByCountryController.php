<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersByCountryController extends Controller
{
    public function __invoke($countryName): \Illuminate\Http\JsonResponse
    {
        $users = User::whereHas('companies.country', function ($query) use ($countryName) {
            $query->where('name', $countryName);
        })
            ->with(['companies' => function ($query) use ($countryName) {
                $query->whereHas('country', function ($query) use ($countryName) {
                    $query->where('name', $countryName);
                });
            }])
            ->get();

        return response()->json($users);
    }
}
