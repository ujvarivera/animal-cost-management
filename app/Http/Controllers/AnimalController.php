<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalType;
use Illuminate\Support\Facades\Storage;
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
        $animal = $animal->load('animalType');

        return inertia('Animals/Show', compact('animal'));
    }

    public function create()
    {
        $animalTypes = AnimalType::all();
        
        return inertia('Animals/Create', compact('animalTypes'));        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'is_male' => ['nullable'],
            'birthday' => ['nullable'],
            'image' => ['nullable'],
            'animal_type_id' => ['required'],
        ]);

        $storedPath = $request->hasFile('image') ?
            // $storedPath = Storage::disk('public')->put('animals', $request->image);
            $request->file('image')->store('animals', 'public') :
            null;
        
        $created = Animal::create([
            'name' => $request->get('name'),
            'is_male' => $request->get('is_male'),
            'birthday' => $request->get('birthday'),
            'image' => $storedPath,
            'animal_type_id' => $request->get('animal_type_id'),      
        ]);

        return redirect()->route('animals.index')->with('success', 'Állat sikeresen hozzáadva!');
    }

    public function edit(Animal $animal)
    {
        $animal = $animal->load('animalType');
        $animalTypes = AnimalType::all();
        
        return inertia('Animals/Edit', compact('animal', 'animalTypes'));
    }

    public function update(Request $request, Animal $animal)
    {
        $request->validate([
            'name' => ['required'],
            'is_male' => ['nullable'],
            'birthday' => ['nullable'],
            'image' => ['nullable'],
            'animal_type_id' => ['required'],
        ]);

        if ($request->hasFile('image')) {
            !is_null($animal->image) && Storage::disk('public')->delete($animal->image);
            $storedPath = $request->file('image')->store('animals', 'public');
        } else {
            $storedPath = $animal->image;
        }


        $updated = $animal->update([
            'name' => $request->get('name'),
            'is_male' => $request->get('is_male'),
            'birthday' => $request->get('birthday'),
            'image' => $storedPath,
            'animal_type_id' => $request->get('animal_type_id'),      
        ]);

        return redirect()->route('animals.index')->with('success', 'Állat adatai sikeresen módosítva!');
    }

    public function destroy(Animal $animal)
    {
        $animal->delete();

        return redirect()->route('animals.index');
    }
}
