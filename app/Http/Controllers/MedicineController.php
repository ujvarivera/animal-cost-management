<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();

        return inertia('Medicines/Index', compact('medicines'));
    }

    public function create()
    {
        $this->authorize('manage', Medicine::class);

        return inertia('Medicines/Create');        
    }

    public function store(Request $request)
    {
        $this->authorize('manage', Medicine::class);

        $validated = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'active_substance' => ['nullable'],
            'registration_number' => ['nullable'],
        ]);

        $created = Medicine::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'active_substance' => $validated['active_substance'],
            'registration_number' => $validated['registration_number'],
        ]);

        return redirect()->route('medicines.index')->with('success', 'Gyógyszer sikeresen hozzáadva!');        
    }

    public function edit(Medicine $medicine)
    {
        $this->authorize('manage', Medicine::class);

        return inertia('Medicines/Edit', compact('medicine'));
    }

    public function update(Request $request, Medicine $medicine)
    {
        $this->authorize('manage', Medicine::class);

        $validated = $request->validate([
            'name' => ['required'],
            'description' => ['nullable'],
            'active_substance' => ['nullable'],
            'registration_number' => ['nullable'],
        ]);

        $medicine->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'active_substance' => $validated['active_substance'],
            'registration_number' => $validated['registration_number'],
        ]);

        return redirect()->route('medicines.index')->with('success', 'Gyógyszer részletei sikeresen módosítva!');        
    }

    public function destroy(Medicine $medicine)
    {
        $this->authorize('manage', Medicine::class);

        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Gyógyszer sikeresen törölve!');
    }
}
