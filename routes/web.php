<?php

use App\Http\Controllers\CoachController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('pokemon')->name('pokemon.')->group(function () {
    Route::get('/', [PokemonController::class, 'index'])->name('index');
    Route::get('create', [PokemonController::class, 'create'])->name('create');
    Route::post('/', [PokemonController::class, 'store'])->name('store');
    Route::get('{id}/edit', [PokemonController::class, 'edit'])->name('edit');
    Route::put('{id}', [PokemonController::class, 'update'])->name('update');
    Route::delete('{id}', [PokemonController::class, 'destroy'])->name('destroy');
});

Route::middleware('auth')->prefix('coaches')->name('coaches.')->group(function () {
    Route::get('/', [CoachController::class, 'index'])->name('index');
    Route::get('create', [CoachController::class, 'create'])->name('create');
    Route::post('/', [CoachController::class, 'store'])->name('store');
    Route::get('{id}/edit', [CoachController::class, 'edit'])->name('edit');
    Route::put('{id}', [CoachController::class, 'update'])->name('update');
    Route::delete('{id}', [CoachController::class, 'destroy'])->name('destroy');
});


require __DIR__ . '/auth.php';
