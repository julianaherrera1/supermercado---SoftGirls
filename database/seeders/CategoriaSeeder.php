<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [

            [
                'nombreCategoria' => 'Despensa',
                'descripcion' => 'Productos casa'
            ],

            [
                'nombreCategoria' => 'Lacteos',
                'descripcion' => 'Leche y otros'
            ],

            [
                'nombreCategoria' => 'Aseo Hogar',
                'descripcion' => 'Aseo y otros'
            ]
        ];

        DB::table('categoria')->insert($categorias);
    }
}
