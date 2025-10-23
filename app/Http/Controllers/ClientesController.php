<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClienteModel;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{

   public function panel()
    {
        $totalClientes = \App\Models\ClienteModel::count();
        $totalFacturas = \App\Models\FacturaModel::count();

        // calcular ingresos del mes actual (sumar campo total de facturas con fecha en el mes actual)
        $ingresosMes = \App\Models\FacturaModel::whereYear('fechaFactura', now()->year)
                        ->whereMonth('fechaFactura', now()->month)
                        ->sum('total');

        return view('clientes.panel', compact('totalClientes','totalFacturas','ingresosMes'));
    }


    public function index()
    {
        $clientes = ClienteModel::orderBy('id','desc')->get();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $r)
    {
        $r->validate([
            'nombreCliente' => 'required|string|max:100',
            'cedulaCliente' => 'nullable|string|max:50',
            'direccionCliente' => 'nullable|string|max:255',
            'telefonoCliente' => 'nullable|string|max:30',
            'generoCliente' => 'nullable|string|max:5',
            'fotoCliente' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $r->only(['nombreCliente','cedulaCliente','direccionCliente','telefonoCliente','generoCliente']);

        if ($r->hasFile('fotoCliente')) {
            $ruta = $r->file('fotoCliente')->store('clientes', 'public');
            $data['fotoCliente'] = $ruta;
        }

        ClienteModel::create($data);

        return redirect()->route('clientes')->with('success','Cliente creado correctamente.');
    }

    public function edit($id)
    {
        $cliente = ClienteModel::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $r, $id)
    {
        $r->validate([
            'nombreCliente' => 'required|string|max:100',
            'cedulaCliente' => 'nullable|string|max:50',
            'direccionCliente' => 'nullable|string|max:255',
            'telefonoCliente' => 'nullable|string|max:30',
            'generoCliente' => 'nullable|string|max:5',
            'fotoCliente' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $cliente = ClienteModel::findOrFail($id);
        $cliente->nombreCliente = $r->nombreCliente;
        $cliente->cedulaCliente = $r->cedulaCliente;
        $cliente->direccionCliente = $r->direccionCliente;
        $cliente->telefonoCliente = $r->telefonoCliente;
        $cliente->generoCliente = $r->generoCliente;

        if ($r->hasFile('fotoCliente')) {
            if ($cliente->fotoCliente && Storage::disk('public')->exists($cliente->fotoCliente)) {
                Storage::disk('public')->delete($cliente->fotoCliente);
            }
            $cliente->fotoCliente = $r->file('fotoCliente')->store('clientes','public');
        }

        $cliente->save();

        return redirect()->route('clientes')->with('success','Cliente actualizado correctamente.');
    }

    public function destroy($id)
    {
        $cliente = ClienteModel::findOrFail($id);
        if ($cliente->fotoCliente && Storage::disk('public')->exists($cliente->fotoCliente)) {
            Storage::disk('public')->delete($cliente->fotoCliente);
        }
        $cliente->delete();
        return redirect()->route('clientes')->with('success','Cliente eliminado.');
    }
}
