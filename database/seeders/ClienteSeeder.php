<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes =[
            [
                'nombreCliente' => 'Maria Londoño',
                'cedulaCliente' => '1234',
                'direccionCliente' => 'Palenque',
                'telefonoCliente' => '3201746905',
                'generoCliente' => 'F',
                'fotoCliente' => 'maria.jpg'
            ],

            [
                'nombreCliente' => 'Katherin Chaverra',
                'cedulaCliente' => '4567',
                'direccionCliente' => 'Popular 1',
                'telefonoCliente' => '3215693433',
                'generoCliente' => 'F',
                'fotoCliente' => 'katherin.jpg'
            ],

            [
                'nombreCliente' => 'Isabella Torres',
                'cedulaCliente' => '8901',
                'direccionCliente' => 'Belen',
                'telefonoCliente' => '3001203090',
                'generoCliente' => 'F',
                'fotoCliente' => 'isabella.jpg'
            ],

            [
                'nombreCliente' => 'Ximena Cardona',
                'cedulaCliente' => '5564',
                'direccionCliente' => 'Manrique',
                'telefonoCliente' => '3105984562',
                'generoCliente' => 'F',
                'fotoCliente' => 'ximena.jpg'
            ],

            [
                'nombreCliente' => 'Valentina Torres',
                'cedulaCliente' => '9852',
                'direccionCliente' => 'Francia',
                'telefonoCliente' => '314526693',
                'generoCliente' => 'F',
                'fotoCliente' => 'vale.jpg'
            ]
        ];

        DB::table('cliente')->insert($clientes);
    }
}
