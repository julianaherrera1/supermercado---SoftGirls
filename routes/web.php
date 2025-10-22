<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Rutas Clientes
Route::get('/clientes', [ClientesController::class, 'index'])->middleware(['auth', 'verified'])->name('clientes');

// Rutas Categorias
/*
Route::get('/categorias', [CategoriaController::class, 'index'])->middleware(['auth', 'verified'])->name('categorias');
Route::get('/categoriaUno', [CategoriaController::class, 'listarUno'])->middleware(['auth', 'verified'])->name('categorias');
Route::get('/categoriaDos', [CategoriaController::class, 'listarCondicion'])->middleware(['auth', 'verified'])->name('categorias');
*/

Route::get('/categorias', [CategoryController::class, 'index'])->middleware(['auth', 'verified'])->name('categorias');
Route::get('/categorias/registro', [CategoryController::class, 'form_registro'])->middleware(['auth', 'verified'])->name('form_reg_categoria');
Route::post('/categorias/registro', [CategoryController::class, 'registrar'])->middleware(['auth', 'verified'])->name('registro_categoria');
Route::get('/categorias/edicion/{id}', [CategoryController::class, 'form_edicion'])->middleware(['auth', 'verified'])->name('form_edc_categoria');
Route::post('/categorias/edicion/{id}', [CategoryController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('actualiza_categoria');
Route::get('/categorias/eliminacion/{id}', [CategoryController::class, 'eliminar'])->middleware(['auth', 'verified'])->name('elimina_categoria');



// Rutas de Productos
/*
Route::get('/productos', [ProductoController::class, 'index'])->middleware(['auth', 'verified'])->name('productos');
*/
// Listar
Route::get('/productos', [ProductController::class, 'index'])->middleware(['auth', 'verified'])->name('productos');

// Crear
Route::get('/productos/registro', [ProductController::class, 'form_registro'])->middleware(['auth', 'verified'])->name('form_reg_producto');
Route::post('/productos/registro', [ProductController::class, 'registrar'])->middleware(['auth', 'verified'])->name('registro_producto');

// Editar
Route::get('/productos/edicion/{id}', [ProductController::class, 'form_edicion'])->middleware(['auth', 'verified'])->name('form_edicion');
Route::post('/productos/edicion/{id}', [ProductController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('actualiza_producto');

// Eliminar
Route::delete('/productos/eliminacion/{id}', [ProductController::class, 'eliminar'])->middleware(['auth', 'verified'])->name('elimina_producto');



require __DIR__.'/auth.php';