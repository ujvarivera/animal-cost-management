<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\MedicalRecordLine;
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

        $medicalRecordLines = MedicalRecordLine::all();
        $costOfMedicalRecords = 0;
        $medicalRecordLines->each(function ($medicalRecordLine) use (&$costOfMedicalRecords) {
            $costOfMedicalRecords += $medicalRecordLine->cost;
        });

        return inertia('Dashboard', compact('animalsCount', 'animalTypesCount', 'costOfMedicalRecords'));
    }
}
