@extends('layouts.base')

@section('title', 'Editar Coach')

@section('content')
<div class="flex items-center justify-center min-h-[80vh]">
    <div class="max-w-lg w-full bg-white rounded-lg shadow-lg p-6">
        <h1 class="text-3xl font-bold text-blue-600 text-center mb-6">Editar Coach</h1>
        <form action="{{ route('coaches.update', $coach->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Nome -->
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-1">Nome do Coach</label>
                <input type="text" id="name" name="name" value="{{ $coach->name }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-600 focus:outline-none" required>
            </div>

            <!-- Imagem -->
            <div>
                <label for="image" class="block text-gray-700 font-semibold mb-1">Imagem do Coach</label>
                <input type="file" id="image" name="image" class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                @if ($coach->image)
                <img src="{{ asset($coach->image) }}" alt="Imagem do Coach" class="mt-4 w-32 h-32 object-cover">
                @else
                <img src="https://via.placeholder.com/128" alt="No Image Available" class="mt-4 w-32 h-32 object-cover">
                @endif
            </div>

            <!-- Botão -->
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-3 rounded-lg shadow-lg hover:bg-blue-700 transition">
                    Atualizar Coach
                </button>
            </div>
        </form>
    </div>
</div>
@endsection