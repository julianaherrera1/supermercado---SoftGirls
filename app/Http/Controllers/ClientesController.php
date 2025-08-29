<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ClientesController extends Controller
{
    public function index(){
        $clientes = DB::table('cliente')->get(); // select * from cliente;
        return view('Clientes.listado', ['clientes'=> $clientes]);
    }

     public function listarUno(){
        $clientes = DB::table('cliente')->first(); // select * from categoria limit 1;
        return view('Clientes.listadoUno', ['c'=> $clientes]);
    }

    public function clientesDeAranjuez(){
    $clientes = DB::table('cliente')
        ->where('direccionCliente', 'Aranjuez') // Filtro por dirección
        ->get();

    return view('Clientes.listadoAranjuez', ['clientes' => $clientes]);
    }

      public function clientesMujeres(){
    $clientes = DB::table('cliente')
        ->where('generoCliente', 'F') // Filtro por genero
        ->get();

    return view('Clientes.listadoMujeres', ['clientes' => $clientes]);
    }
}
