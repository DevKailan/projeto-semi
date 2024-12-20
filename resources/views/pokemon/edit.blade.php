@extends('layouts.base')

@section('title', 'Editar Pokemon')

@section('content')
<div class="flex items-center justify-center min-h-[80vh]">
    <div class="max-w-lg w-full bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-pokemonBlue text-center mb-6">Editar Pokemon</h1>
        <form action="{{ route('pokemon.update', $pokemon->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Nome do Pokemon</label>
                <input type="text" id="name" name="name" value="{{ $pokemon->name }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
            </div>

            <div>
                <label for="type" class="block text-gray-700 font-semibold mb-1">Tipo</label>
                <input type="text" id="type" name="type" value="{{ $pokemon->type }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
            </div>


            <div>
                <label for="power" class="block text-gray-700 font-semibold mb-1">Poder</label>
                <input type="number" id="power" name="power" value="{{ $pokemon->power }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
            </div>


            <div>
                <label for="coach_id" class="block text-gray-700 font-semibold mb-1">Coach</label>
                <select id="coach_id" name="coach_id" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-pokemonBlue focus:outline-none" required>
                    <option value="" disabled>Selecione um Coach</option>
                    @foreach ($coaches as $coach)
                    <option value="{{ $coach->id }}" @if ($pokemon->coach_id == $coach->id) selected @endif>{{ $coach->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="image" class="block text-gray-700 font-semibold mb-1">Imagem do Pokemon</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                @if ($pokemon->image)
                <img src="{{ asset($pokemon->image) }}" alt="{{ $pokemon->name }}" class="mt-4 w-32 h-32 object-cover">
                @endif
            </div>

            <div class="text-center">
                <button type="submit"
                    class="bg-pokemonBlue text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
                    Atualizar Pokemon
                </button>
            </div>
        </form>
    </div>
</div>
@endsection