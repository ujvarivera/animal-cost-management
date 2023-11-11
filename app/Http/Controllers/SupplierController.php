<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return inertia('Suppliers/Index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('manage', Supplier::class);

        return inertia('Suppliers/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('manage', Supplier::class);

        $request->validate([
            'name' => ['required'],
            'tax_number' => ['nullable'],
            'registration_number' => ['nullable'],
            'zipcode' => ['nullable'],
            'city' => ['nullable'],
            'street' => ['nullable'],
            'street_number' => ['nullable'],
            'phone_number' => ['nullable']
        ]);

        $created = Supplier::create([
            'name' => $request->get('name'),
            'tax_number' => $request->get('tax_number'),
            'registration_number' => $request->get('registration_number'),
            'zipcode' => $request->get('zipcode'),
            'city' => $request->get('city'),
            'street' => $request->get('street'),
            'street_number' => $request->get('street_number'),
            'phone_number' => $request->get('phone_number'),     
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Beszállító sikeresen hozzáadva!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $this->authorize('manage', Supplier::class);

        $supplier->delete();

        return redirect()->route('suppliers.index')->with('success', 'Beszállító sikeresen törölve!');
    }
}
