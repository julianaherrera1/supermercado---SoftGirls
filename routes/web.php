<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
Route::get('/clientes/primero', [ClientesController::class, 'listarUno'])->name('clientes.primero');
Route::get('/clientes/aranjuez', [ClientesController::class, 'clientesDeAranjuez'])->name('clientes.aranjuez');
Route::get('/clientes/mujeres', [ClientesController::class, 'clientesMujeres'])->name('clientes.mujeres');


require __DIR__.'/auth.php';
