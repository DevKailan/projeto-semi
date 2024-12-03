<?php

use App\Http\Controllers\PokemonController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/', function () {
    return view('welcome');
});


Route::get('pokemon', [PokemonController::class, 'index'])->name('pokemon.index');


Route::get('pokemon/create', [PokemonController::class, 'create'])->name('pokemon.create');


Route::post('pokemon', [PokemonController::class, 'store'])->name('pokemon.store');

Route::get('pokemon/{id}/edit', [PokemonController::class, 'edit'])->name('pokemon.edit');


Route::put('pokemon/{id}', [PokemonController::class, 'update'])->name('pokemon.update');


Route::delete('pokemon/{id}', [PokemonController::class, 'destroy'])->name('pokemon.destroy');
