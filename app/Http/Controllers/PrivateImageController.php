<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivateImageController extends Controller
{
    public function show($image)
    {
        return response()->disk('private')->file($image);
    }
}
