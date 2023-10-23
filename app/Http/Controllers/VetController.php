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
}
