<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Equipment;
use App\Models\Medicine;
use App\Models\Nourishment;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supplies = Supply::with('animal', 'suppliable', 'supplier')->get();

        return inertia('Supplies/Index', compact('supplies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manage', Supply::class);

        $suppliableTypes = [
            [
                'name' => 'Felszerelés',
                'type' => 'App\Models\Equipment'
            ],
            [
                'name' => 'Táplálék',
                'type' => 'App\Models\Nourishment'
            ],
            [
                'name' => 'Gyógyszer',
                'type' => 'App\Models\Medicine'
            ]
        ];

        $equipments = Equipment::all();
        $nourishments = Nourishment::all();
        $medicines = Medicine::all();
        $animals = Animal::all();
        $suppliers = Supplier::all();

        return inertia('Supplies/Create', compact('suppliableTypes', 'equipments', 'nourishments', 'medicines', 'animals', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manage', Supply::class);

        $request->validate([
            'suppliable_type' => ['required'],
            'suppliable_id' => ['required'],
            'supply_type' => ['required'],
            'quantity' => ['required'],
            'unit_price' => ['nullable'],
            'date' => ['required'],
            'animal_id' => ['nullable'],
            'supplier_id' => ['nullable']
        ]);

        Supply::create([
            'suppliable_type' => $request->get('suppliable_type'),
            'suppliable_id' => $request->get('suppliable_id'),
            'supply_type' => $request->get('supply_type'),
            'quantity' => $request->get('quantity'),
            'unit_price' => $request->get('unit_price'),
            'date' => $request->get('date'),
            'animal_id' => $request->get('animal_id'),
            'supplier_id' => $request->get('supplier_id'),     
        ]);

        return redirect()->route('supplies.index')->with('success', 'Új készlet információ hozzáadva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supply $supply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supply $supply)
    {
        $this->authorize('manage', Supply::class);

        $supply->delete();

        return redirect()->back()->with('success', 'Készlet eleme sikeresen törölve!');
    }
}
