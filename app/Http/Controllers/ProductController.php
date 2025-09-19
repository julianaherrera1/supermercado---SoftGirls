<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductoModel; //Importando el modelo

class ProductController extends Controller
{
    public function index() { 
        $productos = ProductoModel::all(); // select * from (producto)
        return view('Productos.listado', compact('productos'));
    }
}
