<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        $query = Categoria::query();

        if ($buscar) {
            $query->where('nombre', 'like', '%'.$buscar.'%')
                ->orwhere('descripcion', 'like', '%'.$buscar.'%');
        }
        $categorias = $query->paginate(10);
        return view('admin.categorias.index', compact('categorias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'nombre' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categorias,slug',
            'descripcion' => 'nullable|string',
        ]);
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();

        return redirect()->route('admin.categorias.index')
        ->with('mensaje', 'Categoría creada exitosamente')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.show', compact('categoria'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $categoria = Categoria::findOrFail($id);
        return view('admin.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'nombre' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categorias,slug,'.$id,
            'descripcion' => 'nullable|string',
        ]);
        $categoria = Categoria::findOrFail($id);
        $categoria->nombre = $request->nombre;
        $categoria->slug = $request->slug;
        $categoria->descripcion = $request->descripcion;
        $categoria->save();
            return redirect()->route('admin.categorias.index')
            ->with('mensaje', 'categoría actualizada exitosamente')
            ->with('icono', 'success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();

        return redirect()->route('admin.categorias.index')
        ->with('mensaje', 'Categoria eliminada exitosamente')
        ->with('icono', 'success');
    }
}
