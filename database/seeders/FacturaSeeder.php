<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FacturaModel;
use App\Models\ClienteModel;
use App\Models\DetalleModel;
use App\Models\ProductoModel;

class FacturaSeeder extends Seeder
{
    public function run(): void
    {
        $clientes = ClienteModel::all();
        $productos = ProductoModel::all();

        if ($clientes->count() == 0 || $productos->count() == 0) {
            return;
        }

        foreach (range(1, 10) as $i) {
            $cliente = $clientes->random();
            $factura = FacturaModel::create([
                'cliente' => $cliente->id,
                'fechaFactura' => now()->subDays(rand(0, 30)),
                'total' => 0
            ]);

            $total = 0;
            foreach ($productos->random(rand(2, 5)) as $producto) {
                $cantidad = rand(1, 3);
                $precio = $producto->precioProducto;
                $subtotal = $precio * $cantidad;
                $total += $subtotal;

                DetalleModel::create([
                    'factura' => $factura->id,
                    'producto' => $producto->id,
                    'cantidad' => $cantidad,
                    'precio' => $precio
                ]);
            }

            $factura->update(['total' => $total]);
        }
    }
}
