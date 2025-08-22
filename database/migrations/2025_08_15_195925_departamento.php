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
        Schema::create('departmento', function (Blueprint $table) {
        $table->string('department_id', 5);
        $table->string('department_name', 200);
        $table->string('faculty', 10);
        $table->primary('department_id');
        $table->foreign('faculty')->references('faculty_id')->on('facultad');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
