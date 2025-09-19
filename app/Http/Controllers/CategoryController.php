<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaModel; //Importando el modelo

class CategoryController extends Controller
{
    public function index() {
        $categorias = CategoriaModel::all(); // select * from (categoria)
        return view('Categorias.listado', compact('categorias'));
    }
    
    public function form_registro() {
        /** Esta funcion sera invocada cuando el usuario le de clic en adicionar */
        return view('Categorias.form_registro');
    }

    public function registrar(Request $r) {

    }
}
