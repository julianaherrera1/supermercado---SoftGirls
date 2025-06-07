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
                ]
            ];
        DB::table('producto')->insert($productos);
    }
}
