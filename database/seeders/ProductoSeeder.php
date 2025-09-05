<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productos = [
                [
                    'nombreProducto' => 'Arroz Diana',
                    'cantidadProducto' => 100,
                    'precioProducto' => 3000,
                    'fotoProducto' => 'arroz.jpg',
                    'categoria' => 1
                ],

                [
                    'nombreProducto' => 'Papel Higenico Familia',
                    'cantidadProducto' => 50,
                    'precioProducto' => 15000,
                    'fotoProducto' => 'papel.jpg',
                    'categoria' => 3
                ],

                [
                    'nombreProducto' => 'Limpia vidrios Xd',
                    'cantidadProducto' => 25,
                    'precioProducto' => 8700,
                    'fotoProducto' => 'vidrio.jpg',
                    'categoria' => 3
                ],

                [
                    'nombreProducto' => 'Azucar Manuelita Kilo',
                    'cantidadProducto' => 28,
                    'precioProducto' => 4500,
                    'fotoProducto' => 'azucar.jpg',
                    'categoria' => 1
                ],

                [
                    'nombreProducto' => 'Leche Alqueria',
                    'cantidadProducto' => 45,
                    'precioProducto' => 8400,
                    'fotoProducto' => 'leche.jpg',
                    'categoria' => 2
                ],

                [
                    'nombreProducto' => 'Jabon Protex',
                    'cantidadProducto' => 70,
                    'precioProducto' => 3800,
                    'fotoProducto' => 'jabon.jpg',
                    'categoria' => 2
                ],

                [
                    'nombreProducto' => 'Papel Higenico Scott',
                    'cantidadProducto' => 35,
                    'precioProducto' => 15000,
                    'fotoProducto' => 'papelS.jpg',
                    'categoria' => 3
                ]
  
            ];
        DB::table('producto')->insert($productos);
    }
}
