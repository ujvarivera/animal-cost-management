<?php

use App\Http\Controllers\AnimalController;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MedicalRecordController;
use App\Http\Controllers\MedicalRecordLineController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PrivateImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\SupplyController;
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

Route::get('/dashboard', DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/about', fn () => Inertia::render('About'))->name('about');

    Route::resource('users', UserController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('admin')->group(function () {
        Route::resource('animaltypes', AnimalTypeController::class)->except(['index', 'show']);
        Route::resource('animals', AnimalController::class)->except(['index', 'show']);
        Route::resource('vets', VetController::class)->except(['index', 'show']);
        Route::resource('medicines', MedicineController::class)->except(['index', 'show']);
        Route::resource('medical-records', MedicalRecordController::class)->except(['index', 'show']);
        Route::resource('medical-record-lines', MedicalRecordLineController::class)->except(['index', 'show']);
        Route::resource('suppliers', SupplierController::class)->except(['index', 'show']);
        Route::resource('supplies', SupplyController::class)->except(['index', 'show']);
    });

    Route::resource('animaltypes', AnimalTypeController::class)->only(['index', 'show']);
    Route::resource('animals', AnimalController::class)->only(['index', 'show']);
    Route::resource('vets', VetController::class)->only(['index', 'show']);
    Route::resource('medicines', MedicineController::class)->only(['index', 'show']);
    Route::resource('medical-records', MedicalRecordController::class)->only(['index', 'show']);
    Route::resource('medical-record-lines', MedicalRecordLineController::class)->only(['index', 'show']);
    Route::resource('suppliers', SupplierController::class)->only(['index', 'show']);
    Route::resource('supplies', SupplyController::class)->only(['index', 'show']);
});
Route::get('private-images/{image}', [PrivateImageController::class, 'show']);

require __DIR__.'/auth.php';
