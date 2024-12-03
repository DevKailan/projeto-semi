<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = Coach::all();
        return view('coaches.index', compact('coaches'));
    }

    public function create()
    {
        return view('coaches.create');
    }

    public function store(Request $request)
    {
        // Corrigindo o armazenamento da imagem
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $coach = new Coach();
        $coach->name = $request->name;
        $coach->image = 'images/' . $imageName; // Salva o caminho correto da imagem
        $coach->save();

        return redirect('coaches')->with('success', 'Coach criado com sucesso!');
    }

    public function edit($id)
    {
        $coach = Coach::findOrFail($id); // Corrigida a variável utilizada
        return view('coaches.edit', compact('coach')); // Passa o coach correto para a view
    }

    public function update(Request $request, $id)
    {
        $coach = Coach::findOrFail($id);

        $coach->name = $request->name;

        
        if ($request->image) { 
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $coach->image = 'images/' . $imageName;
        }

        $coach->save();

        return redirect('coaches')->with('success', 'Coach atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $coach = Coach::findOrFail($id);
        $coach->delete();

        return redirect('coaches')->with('success', 'Coach excluído com sucesso!');
    }
}
