<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacturaModel;
use App\Models\DetalleModel;
use App\Models\ProductoModel;
use App\Models\ClienteModel;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = FacturaModel::with('cliente')->orderBy('id', 'desc')->paginate(10);
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = ClienteModel::all();
        $productos = ProductoModel::where('cantidadProducto', '>', 0)->get();
        return view('facturas.create', compact('clientes','productos'));
    }

    public function store(Request $r)
    {
        $r->validate([
            'cliente' => 'required|exists:cliente,id',
            'items' => 'required|array|min:1',
            'items.*.producto' => 'required|exists:producto,id',
            'items.*.cantidad' => 'required|integer|min:1'
        ]);

        DB::beginTransaction();
        try {
            $total = 0;
            // Crear factura
            $fac = new FacturaModel();
            $fac->cliente = $r->cliente;
            $fac->fechaFactura = now();
            $fac->total = 0; // temporal
            $fac->save();

            foreach($r->items as $it) {
                $prod = ProductoModel::findOrFail($it['producto']);
                $cantidad = (int)$it['cantidad'];
                $precio = $prod->precioProducto;
                $sub = $precio * $cantidad;
                $total += $sub;

                // crear detalle
                DetalleModel::create([
                    'factura' => $fac->id,
                    'producto' => $prod->id,
                    'cantidad' => $cantidad,
                    'precio' => $precio
                ]);

                // decrementar stock (opcional)
                $prod->cantidadProducto = max(0, $prod->cantidadProducto - $cantidad);
                $prod->save();
            }

            $fac->total = $total;
            $fac->save();

            DB::commit();
            return redirect()->route('facturas.index')->with('success','Factura creada correctamente.');

        } catch(\Exception $e){
            DB::rollBack();
            return back()->withErrors('Ocurrió un error: '.$e->getMessage());
        }
    }

    public function show($id)
    {
        $factura = FacturaModel::with(['cliente','detalles.producto'])->findOrFail($id);
        return view('facturas.show', compact('factura'));
    }

    public function edit($id)
    {
        $factura = FacturaModel::findOrFail($id);
        return view('facturas.edit', compact('factura'));
    }

    public function update(Request $request, $id)
    {
        // Aquí luego implementas la actualización
        return redirect()->route('facturas.index')->with('success', 'Factura actualizada correctamente.');
    }

}
