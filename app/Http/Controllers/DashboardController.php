<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $animalTypesCount = AnimalType::all()->count();
        $animalsCount = Animal::all()->count();
        //dd($animalsCount);
        return inertia('Dashboard', compact('animalsCount', 'animalTypesCount'));
    }
}
