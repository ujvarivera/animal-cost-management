<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->isAdmin());
        return Inertia::render('Users/Index', [
            'users' => User::with('role')->paginate()
        ]);
    }

    public function create()
    {
        $this->authorize('manage', User::class);

        return inertia('Users/Create');
    }

    public function store(Request $request)
    {
        $this->authorize('manage', User::class);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('users.index')->with('success', 'Felhasználó sikeresen hozzáadva!');
    }

    public function destroy(User $user)
    {
        $this->authorize('manage', User::class);

        $user->delete();

        return redirect()->route('users.index')->with('success', 'Felhasználó sikeresen törölve!');
    }

}
