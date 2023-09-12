<?php

namespace App\Http\Controllers;
use App\Models\Empleo;
use Illuminate\Http\Request;

class EmpleoController extends Controller
{
    public function index()
    {
        $empleos = Empleo::all();
        return view('empleos.index', ['empleos' => $empleos]);
    }

    public function create()
    {
        return view('empleos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
        ]);

        $empleo = new Empleo;
        $empleo->titulo = $request->titulo;
        $empleo->descripcion = $request->descripcion;
        $empleo->save();

        return redirect()->route('empleos.index');
    }
    // ...

public function edit($id)
{
    $empleo = Empleo::findOrFail($id);
    return view('empleos.edit', ['empleo' => $empleo]);
}

public function update(Request $request, $id)
{
    $request->validate([
        'titulo' => 'required|max:255',
        'descripcion' => 'required',
    ]);

    $empleo = Empleo::findOrFail($id);
    $empleo->titulo = $request->titulo;
    $empleo->descripcion = $request->descripcion;
    $empleo->save();

    return redirect()->route('empleos.index');
}

public function destroy($id)
{
    $empleo = Empleo::findOrFail($id);
    $empleo->delete();

    return redirect()->route('empleos.index');
}
public function __construct()
{
    $this->middleware('auth'); // Asegurarte de que el usuario esté autenticado.
    $this->middleware(function ($request, $next) {
        if (auth()->user()->user_type !== 'empleador') {
            return redirect('/home')->withErrors('No tienes permiso para realizar esta acción.');
        }

        return $next($request);
    })->only('create', 'store'); // Añade aquí las acciones que quieras proteger.
}

// ...


    //... (aquí irían otros métodos, como show, update, etc., si los tuvieras)
}
