<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;
use Illuminate\Support\Facades\DB;
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

    public function form_edicion($id)
    {
        // Buscar producto
        $producto = DB::table('producto')
            ->join('categoria', 'producto.categoria', '=', 'categoria.id')
            ->select('producto.*', 'categoria.nombreCategoria')
            ->where('producto.id', $id)
            ->first();

        // ✅ Traer todas las categorías
        $categorias = CategoriaModel::all();

          if (!$producto) {
        abort(404, 'Producto no encontrado');
        }


        // ✅ Enviar ambas variables a la vista
        return view('Productos.form_edicion', compact('producto', 'categorias'));
    }

        public function actualizar(Request $request, $id)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:100',
            'cantidad_producto' => 'required|integer|min:0',
            'precio_producto' => 'required|numeric|min:0',
            'foto_producto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'categoria' => 'required|exists:categoria,id',
        ]);

        $product = ProductoModel::findOrFail($id);
        $product->nombreProducto = $request->nombre_producto;
        $product->cantidadProducto = $request->cantidad_producto;
        $product->precioProducto = $request->precio_producto;
        $product->categoria = $request->categoria;

        // Si suben nueva imagen
        if ($request->hasFile('foto_producto')) {
            if ($product->fotoProducto && Storage::disk('public')->exists($product->fotoProducto)) {
                Storage::disk('public')->delete($product->fotoProducto);
            }
            $ruta = $request->file('foto_producto')->store('productos', 'public');
            $product->fotoProducto = $ruta;
        }

        $product->save();

/*        return redirect()->route('productos')->with('success', 'Producto actualizado correctamente.'); 
 */            
        return redirect()->back()->with('success', 'Producto actualizado correctamente.');

    }

    // 🗑️ (Para después) Eliminar producto
     public function eliminar($id)
    {
        // Buscar el producto por ID, si no existe lanza 404
        $product = ProductoModel::findOrFail($id);

        // Eliminar la imagen si existe en storage
        if ($product->fotoProducto && Storage::disk('public')->exists($product->fotoProducto)) {
            Storage::disk('public')->delete($product->fotoProducto);
        }

        // Eliminar el producto de la base de datos
        $product->delete();

        // Redirigir de vuelta con mensaje de éxito
        return redirect()->back()->with('success', 'Producto eliminado correctamente.');
    }
}
