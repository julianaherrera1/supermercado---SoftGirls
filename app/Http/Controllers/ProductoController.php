<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function index(){
        // Listar todos los datos de la tabla
        $productos = DB::table('producto')->get(); // select * from productos;
        return view('Productos.listado', compact('productos'));
    }
}
