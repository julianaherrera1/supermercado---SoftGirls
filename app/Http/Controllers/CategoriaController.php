<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function index(){
        // Listar todos los datos de la tabla
        $categorias = DB::table('categoria')->get(); // select * from categoria;
        return view('Categorias.listado', ['categorias'=> $categorias]);
    }

    public function listarUno(){
        // Listar unicamente el primer registro de la tabla
        $categorias = DB::table('categoria')->first(); // select * from categoria limit 1;
        return view('Categorias.listadoUno', ['c'=> $categorias]);
    }

    public function listarCondicion(){
        //Lista el o los registros que cumplan una condición
        $categorias = DB::table('categoria')
        ->where('nombreCategoria', 'Lacteos')
        ->get();
        return view('Categorias.listadoDos', ['categorias'=> $categorias]);
    }



}
