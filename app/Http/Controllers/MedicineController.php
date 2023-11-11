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
        
    }

    public function destroy(Medicine $medicine)
    {
        $this->authorize('manage', Medicine::class);

        $medicine->delete();

        return redirect()->route('medicines.index')->with('success', 'Gyógyszer sikeresen törölve!');
    }
}
