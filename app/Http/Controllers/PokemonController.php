<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\Pokemon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect('pokemon');
        }

        $pokemon = Pokemon::all();
        return view('pokemon.index', compact('pokemon'));
    }

    public function create()
    {
        if (!Gate::allows('create', Pokemon::class)) {
            return redirect('pokemon');
        }

        $coaches = Coach::all();
        return view('pokemon.create', compact('coaches'));
    }

    public function store(Request $request)
    {
        $pokemon = new Pokemon();
        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;
        $pokemon->coach_id = $request->coach_id;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $pokemon->image = 'images/' . $imageName;
        }

        $pokemon->save();

        return redirect('pokemon')->with('success', 'Pokemon criado com sucesso!');
    }

    public function edit($id)
    {
        $pokemon = Pokemon::findOrFail($id);


        $coaches = Coach::all();
        return view('pokemon.edit', compact('pokemon', 'coaches'));
    }


    public function update(Request $request, $id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->name = $request->name;
        $pokemon->type = $request->type;
        $pokemon->power = $request->power;
        $pokemon->coach_id = $request->coach_id;

        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $pokemon->image = 'images/' . $imageName;
        }

        $pokemon->save();

        return redirect('pokemon')->with('success', 'Pokemon atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $pokemon = Pokemon::findOrFail($id);
        $pokemon->delete();
        return redirect('pokemon')->with('success', 'Pokemon excluído com sucesso!');
    }
}
