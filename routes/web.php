<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FacturaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rutas públicas
|
*/

Route::get('/', function () {
    return view('welcome'); // o tu nueva vista de inicio
});

/*
|--------------------------------------------------------------------------
| Rutas protegidas por auth
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard principal (productos)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Productos
    Route::get('/productos', [ProductController::class, 'index'])->name('productos');
    Route::get('/productos/registro', [ProductController::class, 'form_registro'])->name('form_reg_producto');
    Route::post('/productos/registro', [ProductController::class, 'registrar'])->name('registro_producto');
    Route::get('/productos/edicion/{id}', [ProductController::class, 'form_edicion'])->name('form_edicion');
    Route::post('/productos/edicion/{id}', [ProductController::class, 'actualizar'])->name('actualiza_producto');
    Route::delete('/productos/eliminacion/{id}', [ProductController::class, 'eliminar'])->name('elimina_producto');

    // Categorías
    Route::get('/categorias', [CategoryController::class, 'index'])->name('categorias');
    Route::get('/categorias/registro', [CategoryController::class, 'form_registro'])->name('form_reg_categoria');
    Route::post('/categorias/registro', [CategoryController::class, 'registrar'])->name('registro_categoria');
    Route::get('/categorias/edicion/{id}', [CategoryController::class, 'form_edicion'])->name('form_edc_categoria');
    Route::post('/categorias/edicion/{id}', [CategoryController::class, 'actualizar'])->name('actualiza_categoria');
    Route::delete('/categorias/eliminacion/{id}', [CategoryController::class, 'eliminar'])->name('elimina_categoria');

    // Clientes + Panel de facturación
    Route::get('/clientes-panel', [ClientesController::class, 'panel'])->name('clientes_panel');

    Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes');
    Route::get('/clientes/crear', [ClientesController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/edicion/{id}', [ClientesController::class, 'edit'])->name('clientes.edit');
    Route::post('/clientes/{id}', [ClientesController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{id}', [ClientesController::class, 'destroy'])->name('clientes.destroy');

    // Facturas
    Route::get('/facturas', [FacturaController::class, 'index'])->name('facturas.index');
    Route::get('/facturas/create', [FacturaController::class, 'create'])->name('facturas.create');
    Route::post('/facturas', [FacturaController::class, 'store'])->name('facturas.store');
    Route::get('/facturas/{id}', [FacturaController::class, 'show'])->name('facturas.show');
    Route::delete('/facturas/{id}', [FacturaController::class, 'destroy'])->name('facturas.destroy');
    Route::get('/{id}/editar', [FacturaController::class, 'edit'])->name('facturas.edit');
    Route::put('/{id}', [FacturaController::class, 'update'])->name('facturas.update');


    // Perfil (laravel/breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
