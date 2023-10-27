<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\PrivateImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VetController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::get('users', [UserController::class, 'index'])->name('users.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('animal-types', [AnimalTypeController::class, 'index'])->name('animal-types.index');

    /*
    Route::get('animals', [AnimalController::class, 'index'])->name('animals.index');
    Route::get('animals/create', [AnimalController::class, 'create'])->name('animals.create');
    Route::post('animals', [AnimalController::class, 'store'])->name('animals.store');
    Route::get('animals/{animal}', [AnimalController::class, 'show'])->name('animals.show');
    Route::get('animals/{animal}/edit', [AnimalController::class, 'edit'])->name('animals.edit');
    Route::put('animals/{animal}', [AnimalController::class, 'update'])->name('animals.update');
    Route::delete('animals/{animal}', [AnimalController::class, 'destroy'])->name('animals.destroy');
    */
    Route::resource('animals', AnimalController::class);

    Route::resource('vets', VetController::class);

});
Route::get('private-images/{image}', [PrivateImageController::class, 'show']);

require __DIR__.'/auth.php';
