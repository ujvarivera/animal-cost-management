<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    public function index()
    {
        $vets = Vet::all();

        return inertia('Vets/Index', compact('vets'));
    }

    public function create() 
    {
        $this->authorize('manage', Vet::class);

        return inertia('Vets/Create');
    }

    public function store(Request $request) 
    {
        $this->authorize('manage', Vet::class);

        $request->validate([
            'name' => ['required'],
            'zipcode' => ['nullable'],
            'city' => ['nullable'],
            'street' => ['nullable'],
            'street_number' => ['nullable'],
            'phone_number' => ['nullable']
        ]);

        $created = Vet::create([
            'name' => $request->get('name'),
            'zipcode' => $request->get('zipcode'),
            'city' => $request->get('city'),
            'street' => $request->get('street'),
            'street_number' => $request->get('street_number'),
            'phone_number' => $request->get('phone_number'),     
        ]);

        return redirect()->route('vets.index')->with('success', 'Állatorvos sikeresen hozzáadva!');
    }

    public function show(Vet $vet)
    {
        $vet = $vet->load('medicalRecords', 'medicalRecords.animal');

        return inertia('Vets/Show', compact('vet'));
    }

    public function destroy(Vet $vet)
    {
        $this->authorize('manage', Vet::class);

        $vet->delete();

        return redirect()->route('vets.index')->with('success', 'Állatorvos sikeresen törölve!');
    }
}
