<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index(){
        // Listar todos los datos de la tabla
        /*
        $productos = DB::table('producto')->get(); // select * from productos;
        return view('Productos.listado', compact('productos'));

        */

        /*
        Lista todos los datos usando join con la tabla categoria
        $productos = DB::table('producto')
        ->join('categoria', 'producto.categoria', '=', 'categoria.id')
        ->get();
        return view('Productos.listado', compact('productos'));

        */

        // Filtrar los productos con precio menor a 10000
        /*
        $productos = DB::table('producto')
        ->join('categoria', 'producto.categoria', '=', 'categoria.id')
        ->where('precioProducto', '<', 10000)
        ->get();
        return view('Productos.listado', compact('productos'));
        */

        /*
         // Filtrar los productos con precio menor a 10000
        $productos = DB::table('producto')
        ->join('categoria', 'producto.categoria', '=', 'categoria.id')
        ->where('precioProducto', '<', 10000)
        ->get();
        return view('Productos.listado', compact('productos'));

        */

        //Lista todos los datos usando join con la tabla categoria
        $productos = DB::table('producto')
        ->join('categoria', 'producto.categoria', '=', 'categoria.id')
        ->where('precioProducto', '<', 10000)
        ->orderby('nombreProducto', 'desc')
        ->get();
        return view('Productos.listado', compact('productos'));

    }
}
