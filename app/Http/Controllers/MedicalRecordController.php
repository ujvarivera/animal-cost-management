<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\MedicalRecord;
use App\Models\Vet;
use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicalRecords = MedicalRecord::with('animal', 'vet')->get();

        return inertia('MedicalRecords/Index', compact('medicalRecords'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $animals = Animal::all();
        $vets = Vet::all();

        return inertia('MedicalRecords/Create', compact('animals', 'vets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => ['required'],
            'examination_date' => ['nullable'],
            'next_examination' => ['nullable'],
            'total_cost' => ['nullable'],
            'animal_id' => ['required'],
            'vet_id' => ['required'],
        ]);
        
        $createdMedicalRecord = MedicalRecord::create([
            'description' => $request->get('description'),
            'examination_date' => $request->get('examination_date'),
            'next_examination' => $request->get('next_examination'),
            'total_cost' => $request->get('total_cost'), //TODO: nem érdemes külön itt is letárolni
            'animal_id' => $request->get('animal_id'),
            'vet_id' => $request->get('vet_id'),    
        ]);

        if (($request->has('examination_names') && $request->has('costs'))) {
            $examinationNames = $request->get('examination_names');
            $costs = $request->get('costs');
            for ($x = 0; $x < count($examinationNames); $x++) {
                $createdMedicalRecord->lines()->create([
                    'examination_name' => $examinationNames[$x],
                    'cost' => $costs[$x]
                ]);
            }
        }

        return redirect()->route('medical-records.index')->with('success', 'Vizsgálat sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecord $medicalRecord)
    {
        $medicalRecord = $medicalRecord->load('animal', 'vet', 'lines');

        return inertia('MedicalRecords/Show', compact('medicalRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecord $medicalRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecord $medicalRecord)
    {
        $medicalRecord->delete();

        // return redirect()->route('medical-records.index')->with('success', 'Vizsgálat sikeresen törölve!');
        return redirect()->back()->with('success', 'Vizsgálat sikeresen törölve!');
    }
}
