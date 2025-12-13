<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Orden;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    public function index()
    {
        $total_roles = Role::count();
        $total_usuarios = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'SUPER ADMIN');
        })->count();
        $total_categorias = Categoria::count();
        $total_productos = Producto::count();

        $total_pedidos_nuevos = Orden::where('estado_orden', 'Procesando')->count();
        $total_pedidos_enviados = Orden::where('estado_orden', 'Enviado')->count();
        $total_pedidos = Orden::count();

        $usuarios_mensuales = User::select(
            DB::raw('MONTH(created_at) as mes'),
            DB::raw('COUNT(*) as total')
        )
            ->groupBy('mes')
            ->orderBy('mes')
            ->get()
            ->toArray();

            $usuarios_data = array_fill(1, 12, 0);
            foreach ($usuarios_mensuales as $data) {
                $usuarios_data[$data['mes']] = $data['total'];
            }

            // print_r($usuarios_data);

        return view('admin.index', compact('total_roles', 'total_usuarios', 'total_categorias', 'total_productos', 'total_pedidos_nuevos', 'total_pedidos_enviados', 'total_pedidos', 'usuarios_data'));
    }
}
