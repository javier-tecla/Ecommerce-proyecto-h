<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::paginate(5);

        // return response()->json($roles);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $rol = new Role;
        $rol->name = strtoupper($request->name);

        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol creado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rol = Role::find($id);

        if (!$rol) {
        return response()->view('errors.404-admin', [], 404);
    }

        // return response()->json($rol);
        return view('admin.roles.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rol = Role::find($id);

        return view('admin.roles.edit', compact('rol'));
    }

    public function permisos($id)
    {
        $rol = Role::find($id);
        $permisos = Permission::all()->groupBy(function($permiso) {
            if(stripos($permiso->name, 'admin') !== false) { return 'Vista admin'; }
            if(stripos($permiso->name, 'ajuste') !== false) { return 'Ajustes del sistema'; }
            if(stripos($permiso->name, 'rol') !== false) { return 'Roles'; }
            if(stripos($permiso->name, 'usuario') !== false) { return 'Usuarios'; }
            if(stripos($permiso->name, 'categoría') !== false) { return 'Categorías'; }
            if(stripos($permiso->name, 'producto') !== false) { return 'Productos'; }
            if(stripos($permiso->name, 'pedido') !== false) { return 'Pedidos'; }
        });
        return view('admin.roles.permisos', compact('rol', 'permisos'));
    }

    public function update_permisos(Request $request, $id)
    {
        // return response()->json($request->all());
        $rol = Role::find($id);
        $rol->permissions()->sync($request->permisos);

        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Permisos del rol actualizados exitosamente')
        ->with('icono', 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$id,
        ]);

        $rol = Role::find($id);
        $rol->name = strtoupper($request->name);

        $rol->save();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol actualizado exitosamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // echo $id;
        $rol = Role::find($id);
        $rol->delete();

        return redirect()->route('admin.roles.index')
            ->with('mensaje', 'Rol eliminado exitosamente')
            ->with('icono', 'success');
    }
}
