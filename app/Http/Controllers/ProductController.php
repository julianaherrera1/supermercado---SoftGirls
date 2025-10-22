<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // 📋 Mostrar listado de productos
    public function index()
    {
        // Traer productos con su categoría asociada
        $productos = ProductoModel::with('belongsCategory')->get();
        return view('Productos.listado', compact('productos'));
    }

    // 🧾 Formulario de registro
    public function form_registro()
    {
        $categorias = CategoriaModel::all();
        return view('Productos.form_registro', compact('categorias'));
    }

    // 💾 Registrar producto
    public function registrar(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'cantidad_producto' => 'required|integer|min:1',
            'precio_producto' => 'required|numeric|min:0',
            'foto_producto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categoria' => 'required|exists:categoria,id',
        ]);

        $product = new ProductoModel();
        $product->nombreProducto = $request->nombre_producto;
        $product->cantidadProducto = $request->cantidad_producto;
        $product->precioProducto = $request->precio_producto;
        $product->categoria = $request->categoria;

        // Guardar imagen si existe
        if ($request->hasFile('foto_producto')) {
            $ruta = $request->file('foto_producto')->store('productos', 'public');
            $product->fotoProducto = $ruta;
        }

        $product->save();

        return redirect()->route('productos')->with('success', 'Producto registrado correctamente.');
    }

    // ✏️ (Para después) Formulario de edición
    public function form_edicion($id)
    {
        $producto = ProductoModel::findOrFail($id);
        $categorias = CategoriaModel::all();
        return view('Productos.form_edicion', compact('producto', 'categorias'));
    }

    // 🔁 (Para después) Actualizar producto
    public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'cantidad_producto' => 'required|integer|min:1',
            'precio_producto' => 'required|numeric|min:0',
            'foto_producto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categoria' => 'required|exists:categoria,id',
        ]);

        $product = ProductoModel::findOrFail($id);
        $product->nombreProducto = $request->nombre_producto;
        $product->cantidadProducto = $request->cantidad_producto;
        $product->precioProducto = $request->precio_producto;
        $product->categoria = $request->categoria;

        if ($request->hasFile('foto_producto')) {
            if ($product->fotoProducto && Storage::disk('public')->exists($product->fotoProducto)) {
                Storage::disk('public')->delete($product->fotoProducto);
            }
            $ruta = $request->file('foto_producto')->store('productos', 'public');
            $product->fotoProducto = $ruta;
        }

        $product->save();

        return redirect()->route('productos')->with('success', 'Producto actualizado correctamente.');
    }

    // 🗑️ (Para después) Eliminar producto
    public function eliminar($id)
    {
        $product = ProductoModel::findOrFail($id);

        if ($product->fotoProducto && Storage::disk('public')->exists($product->fotoProducto)) {
            Storage::disk('public')->delete($product->fotoProducto);
        }

        $product->delete();

        return redirect()->route('productos')->with('success', 'Producto eliminado correctamente.');
    }
}
