@extends('layouts.base')

@section('title', 'Adicionar Novo Coach')

@section('content')
<div class="container mx-auto max-w-lg mt-10 p-6 bg-white rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-pokemonBlue text-center mb-6">Adicionar Novo Coach</h1>
    <form action="{{ route('coaches.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <!-- Nome -->
        <div>
            <label for="name" class="block text-gray-700 font-semibold mb-1">Nome do Coach</label>
            <input type="text" id="name" name="name" placeholder="Ex: Ash Ketchum"
                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
        </div>

        <!-- Imagem -->
        <div>
            <label for="image" class="block text-gray-700 font-semibold mb-1">Imagem do Coach</label>
            <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
        </div>

        <!-- Botão -->
        <div class="text-center">
            <button type="submit"
                class="bg-pokemonYellow text-black font-bold px-6 py-3 rounded-lg shadow-lg hover:bg-yellow-400 transition">
                Criar Coach
            </button>
        </div>
    </form>
</div>
@endsection