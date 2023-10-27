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
        return inertia('AnimalTypes/Create');
    }

    public function store(Request $request) 
    {
        $request->validate(['name' => ['required']]);

        $created = AnimalType::create(['name' => $request->get('name')]);

        return redirect()->route('animaltypes.index')->with('success', 'Állatfaj sikeresen hozzáadva!');
    }

    public function destroy(AnimalType $animaltype)
    {
        $animaltype->delete();

        return redirect()->route('animaltypes.index')->with('success', 'Állatfaj sikeresen törölve!');
    }
}
