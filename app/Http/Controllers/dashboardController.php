<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // búsqueda simple opcional
        $q = $request->query('q');

        // ✅ CORREGIR: usar 'categoriaRelacion' en lugar de 'categoria'
        $query = ProductoModel::with('categoriaRelacion');
        
        if ($q) {
            $query->where('nombreProducto', 'like', "%{$q}%");
        }

        // traemos todos (o paginados si prefieres)
        $productos = $query->orderBy('id','desc')->paginate(12)->withQueryString();

        // totales rápidos para mostrar en el dashboard
        $totalProductos = ProductoModel::count();
        $totalCategorias = CategoriaModel::count();

        return view('dashboard', compact('productos','totalProductos','totalCategorias','q'));
    }
}