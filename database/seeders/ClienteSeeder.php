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
            ],
                [
                'nombreCliente' => 'Andrés Mejía',
                'cedulaCliente' => '1122',
                'direccionCliente' => 'Laureles',
                'telefonoCliente' => '3014567890',
                'generoCliente' => 'M',
                'fotoCliente' => 'andres.jpg'
            ],
                [
                'nombreCliente' => 'Camila Restrepo',
                'cedulaCliente' => '2233',
                'direccionCliente' => 'Robledo',
                'telefonoCliente' => '3112345678',
                'generoCliente' => 'F',
                'fotoCliente' => 'camila.jpg'
            ],

            [
                'nombreCliente' => 'Juan Pablo López',
                'cedulaCliente' => '3344',
                'direccionCliente' => 'Envigado',
                'telefonoCliente' => '3029876543',
                'generoCliente' => 'M',
                'fotoCliente' => 'juanpablo.jpg'
            ], 
                [
                'nombreCliente' => 'Laura Sánchez',
                'cedulaCliente' => '4455',
                'direccionCliente' => 'Itagüí',
                'telefonoCliente' => '3207654321',
                'generoCliente' => 'F',
                'fotoCliente' => 'laura.jpg'
            ],

               [
                'nombreCliente' => 'Mateo Álvarez',
                'cedulaCliente' => '5566',
                'direccionCliente' => 'Castilla',
                'telefonoCliente' => '3156789012',
                'generoCliente' => 'M',
                'fotoCliente' => 'mateo.jpg'
            ],

                [
                'nombreCliente' => 'Sofía Ramírez',
                'cedulaCliente' => '6677',
                'direccionCliente' => 'Aranjuez',
                'telefonoCliente' => '3176543210',
                'generoCliente' => 'F',
                'fotoCliente' => 'sofia.jpg'
            ],

                [
                'nombreCliente' => 'Felipe González',
                'cedulaCliente' => '7788',
                'direccionCliente' => 'San Javier',
                'telefonoCliente' => '3001112233',
                'generoCliente' => 'M',
                'fotoCliente' => 'felipe.jpg'
            ],

                [
                'nombreCliente' => 'Carolina Herrera',
                'cedulaCliente' => '8899',
                'direccionCliente' => 'Buenos Aires',
                'telefonoCliente' => '3129988776',
                'generoCliente' => 'F',
                'fotoCliente' => 'carolina.jpg'
                ]
        ];

        DB::table('cliente')->insert($clientes);
    }
}
