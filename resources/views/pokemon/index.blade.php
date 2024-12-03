@extends('layouts.base')

@section('title', 'Lista de Pokemon')

@section('content')
<div class="container mx-auto max-w-screen-lg py-10">
    <!-- Título e Botão -->
    <div class="text-center mb-8">
        <h1 class="text-4xl font-bold text-pokemonBlue">Lista de Pokemon</h1>
        <a href="{{ route('pokemon.create') }}"
            class="mt-6 inline-block bg-pokemonYellow text-black font-bold px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-400 transition">
            Capturar Novo Pokemon
        </a>
    </div>

    <!-- Lista de Pokemons -->
    @if ($pokemon->isEmpty())
    <p class="text-center text-gray-700 text-xl">Nenhum Pokemon capturado ainda. Comece agora!</p>
    @else
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($pokemon as $pokemon)
        
        <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition">
           
            <div class="relative">
                @if ($pokemon->image)
                <img src="{{ asset($pokemon->image) }}" alt="{{ $pokemon->name }}" class="w-full h-40 object-cover rounded-lg mb-4">
                @else
                <img src="https://via.placeholder.com/150x150?text=No+Image"
                    alt="No Image Available"
                    class="w-full h-40 object-cover rounded-lg mb-4">
                @endif
            </div>
            
            <h2 class="text-xl font-bold text-pokemonBlue">{{ $pokemon->name }}</h2>
            <p class="text-gray-600 mt-2">Tipo: <span class="font-semibold">{{ $pokemon->type }}</span></p>
            <p class="text-gray-600">Poder: <span class="font-semibold">{{ $pokemon->power }}</span></p>
            
            <div class="mt-4 flex justify-between">
                <a href="{{ route('pokemon.edit', $pokemon->id) }}"
                    class="bg-pokemonBlue text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                    Editar
                </a>
                <form action="{{ route('pokemon.destroy', $pokemon->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir este Pokemon?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                        class="bg-pokemonRed text-white px-4 py-2 rounded-lg hover:bg-red-600 transition">
                        Excluir
                    </button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection