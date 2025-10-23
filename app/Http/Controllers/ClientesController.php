<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\FacturaModel;
use Illuminate\Support\Facades\Storage;



class ClientesController extends Controller
{
    public function index(){
        $clientes = DB::table('cliente')->get(); // select * from cliente;
        return view('Clientes.listado', ['clientes'=> $clientes]);
    }

    
}
