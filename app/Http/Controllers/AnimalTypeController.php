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
}
