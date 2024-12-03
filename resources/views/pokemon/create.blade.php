@extends('layouts.base')

@section('title', 'Capturar Novo Pokémon')

@section('content')
<div class="flex items-center justify-center min-h-[80vh]">
    <div class="max-w-lg w-full bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-pokemonBlue text-center mb-6">Capturar Novo Pokémon</h1>
        <form action="{{ url('pokemon') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Nome do Pokémon</label>
                <input type="text" id="name" name="name" placeholder="Ex: Pikachu"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none"
                    required>
            </div>

            <div>
                <label for="type" class="block text-gray-700 font-semibold mb-1">Tipo</label>
                <input type="text" id="type" name="type" placeholder="Ex: Elétrico"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none"
                    required>
            </div>

            <div>
                <label for="power" class="block text-gray-700 font-semibold mb-1">Poder</label>
                <input type="number" id="power" name="power" placeholder="Ex: 90"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none"
                    required>
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-pokemonYellow text-black font-bold px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-400 transition">
                    Capturar Pokémon
                </button>
            </div>
        </form>
    </div>
</div>
@endsection