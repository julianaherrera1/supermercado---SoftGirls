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
        Schema::create('facultad', function (Blueprint $table) {
            $table->string('faculty_id', 10);
            $table->string('faculty_name', 200);
            $table->primary('faculty_id');
        });
        // $table->primary(['faculty_id', 'faculty_name']); llave primaria compuesta
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
