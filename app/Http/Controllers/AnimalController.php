<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::with('animalType')->get();

        return inertia('Animals/Index', compact('animals'));
    }

    public function show(Animal $animal)
    {
        return inertia('Animals/Show', compact('animal'));
    }

    public function store(Request $request)
    {
        $request->validate([]);

        Animal::create([

        ]);

        return redirect()->route('animals.index');
    }

    public function edit(Animal $animal)
    {
        return inertia('Animals/Edit', compact('animal'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([]);

        $updated = $animal->update([
            
        ]);

        return redirect()->route('animals.index');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index');
    }
}
