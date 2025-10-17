<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductoModel;

class ProductController extends Controller
{
    public function index(){
        $productos = ProductoModel::all();
        return view('Productos.listado', compact('productos'));
    }
    
}
