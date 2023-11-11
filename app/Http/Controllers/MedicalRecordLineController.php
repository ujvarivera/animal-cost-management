<?php

namespace App\Http\Controllers;

use App\Models\MedicalRecordLine;
use Illuminate\Http\Request;

class MedicalRecordLineController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalRecordLine $medicalRecordLine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalRecordLine $medicalRecordLine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MedicalRecordLine $medicalRecordLine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalRecordLine $medicalRecordLine)
    {
        $this->authorize('manage', MedicalRecordLine::class);

        $medicalRecordLine->delete();

        return redirect()->back()->with('success', 'Vizsgálat sora sikeresen törölve!');
    }
}
