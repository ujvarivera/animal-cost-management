<?php

namespace App\Http\Controllers;

use App\Models\AnimalType;
use Illuminate\Http\Request;

class AnimalTypeController extends Controller
{
    public function index()
    {
        $animalTypes = AnimalType::all();

        return inertia('AnimalTypes/Index', compact('animalTypes'));
    }

    public function create()
    {
        $this->authorize('manage', AnimalType::class);

        return inertia('AnimalTypes/Create');
    }

    public function store(Request $request) 
    {
        $this->authorize('manage', AnimalType::class);

        $request->validate(['name' => ['required']]);

        $created = AnimalType::create(['name' => $request->get('name')]);

        return redirect()->route('animaltypes.index')->with('success', 'Állatfaj sikeresen hozzáadva!');
    }

    public function destroy(AnimalType $animaltype)
    {
        $this->authorize('manage', AnimalType::class);

        $animaltype->delete();

        return redirect()->route('animaltypes.index')->with('success', 'Állatfaj sikeresen törölve!');
    }
}
