<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CategoriaModel; // Importando el modelo

class CategoryController extends Controller
{
    public function index(){
        $categorias = CategoriaModel::all(); // select * from (categoria)
         return view('Categorias.listado', compact('categorias'));
    }

    public function form_registro(){
        /*
        Esta función sera invocada cuando el usuario le de clic en Adicionar
        */
        return view('Categorias.form_registro');
    }

    public function registrar(Request $r){
        $category = new CategoriaModel();
        $category->nombreCategoria = $r->input('nombre_categoria');
        $category->descripcion = $r->input('descripcion_categoria');
        $category->save();
        return redirect()->route('categorias');
    }

    public function form_edicion(){
        /*
        Esta función sera invocada cuando el usuario le de clic en Editar
        */
        return view('Categorias.form_edicion');

    }




}
