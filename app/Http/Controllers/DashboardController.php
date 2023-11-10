<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use App\Models\MedicalRecordLine;
use App\Models\Supply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Dates
        $startDayofCurrentMonth = Carbon::now()->startOfMonth()->toDateString();
        $current = Carbon::now()->toDateString();
        $endDayofCurrentMonth = Carbon::now()->format("Y-m-t");
        $firstDayofPreviousMonth = Carbon::now()->startOfMonth()->subMonth()->toDateString();
        $lastDayofPreviousMonth = Carbon::now()->subMonth()->endOfMonth()->toDateString();

        // Count types (rows)
        $animalTypesCount = AnimalType::all()->count();
        $animalsCount = Animal::all()->count();

        // Costs of all medical treatments
        $medicalRecordLines = MedicalRecordLine::all();
        $costOfMedicalRecords = 0;
        $medicalRecordLines->each(function ($medicalRecordLine) use (&$costOfMedicalRecords) {
            $costOfMedicalRecords += $medicalRecordLine->cost;
        });

        // Incoming supplies in previous month groupped by the type
        $suppliesInPrevMonth = Supply::where('supply_type', '=', 'IN')
            ->where('date', '>', $firstDayofPreviousMonth)
            ->where('date', '<', $lastDayofPreviousMonth)
            ->groupBy('suppliable_type')
            ->select('suppliable_type', DB::raw('SUM(quantity * unit_price) as summed_price'))
            ->get();

        // Incoming supplies in current month groupped by the type
        $suppliesInCurrentMonth = Supply::where('supply_type', '=', 'IN')
            ->where('date', '>', $startDayofCurrentMonth)
            ->groupBy('suppliable_type')
            ->select('suppliable_type', DB::raw('SUM(quantity * unit_price) as summed_price'))
            ->get();

        return inertia('Dashboard', compact(
            'animalsCount', 
            'animalTypesCount', 
            'costOfMedicalRecords',
            'suppliesInPrevMonth',
            'suppliesInCurrentMonth'
            )
        );
    }
}
