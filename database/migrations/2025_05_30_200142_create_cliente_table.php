<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente', 45);
            $table->string('cedulaCliente', 20);
            $table->string('direccionCliente', 45);
            $table->string('telefonoCliente', 20);
            $table->char('generoCliente', 1);
            $table->string('fotoCliente', 100);
            $table->timestamps();
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
