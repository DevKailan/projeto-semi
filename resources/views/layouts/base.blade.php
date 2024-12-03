<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pokémon App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-yellow-200 via-yellow-400 to-yellow-600 min-h-screen flex flex-col">


    <nav class="bg-pokemonBlue text-white shadow-lg">
        <div class="max-w-screen-xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="/" class="flex items-center space-x-2">
                <img src="https://img.icons8.com/color/48/pokeball.png" class="h-8" alt="PokéBall Logo">
                <span class="text-xl font-bold">Pokémon App</span>
            </a>
            <ul class="flex space-x-6">
                <li><a href="/pokemon" class="hover:text-yellow-300">Pokémons</a></li>

            </ul>
        </div>
    </nav>


    <main class="flex-grow">
        @yield('content')
    </main>

</body>

</html>