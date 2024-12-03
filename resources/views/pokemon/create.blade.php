@extends('layouts.base')

@section('title', 'Capturar Novo Pokemon')

@section('content')
<div class="container mx-auto max-w-lg mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-pokemonBlue text-center mb-6">Capturar Novo Pokemon</h1>
    <form action="{{ route('pokemon.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name" class="block text-gray-700 font-semibold mb-1">Nome do Pokemon</label>
            <input type="text" id="name" name="name" placeholder="Ex: Pikachu"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
        </div>


        <div>
            <label for="type" class="block text-gray-700 font-semibold mb-1">Tipo</label>
            <input type="text" id="type" name="type" placeholder="Ex: Elétrico"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
        </div>


        <div>
            <label for="power" class="block text-gray-700 font-semibold mb-1">Poder</label>
            <input type="number" id="power" name="power" placeholder="Ex: 90"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
        </div>


        <div>
            <label for="coach_id" class="block text-gray-700 font-semibold mb-1">Coach</label>
            <select id="coach_id" name="coach_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
                <option value="" disabled selected>Selecione um Coach</option>
                @foreach ($coaches as $coach)
                <option value="{{ $coach->id }}">{{ $coach->name }}</option>
                @endforeach
            </select>
        </div>


        <div>
            <label for="image" class="block text-gray-700 font-semibold mb-1">Imagem do Pokemon</label>
            <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
        </div>

        <div class="text-center">
            <button type="submit"
                class="bg-pokemonYellow text-black font-bold px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-400 transition">
                Capturar Pokemon
            </button>
        </div>
    </form>
</div>
@endsection