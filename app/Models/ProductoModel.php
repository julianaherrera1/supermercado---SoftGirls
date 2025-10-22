<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    use HasFactory;

    protected $table = 'producto'; 
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombreProducto',
        'cantidadProducto',
        'precioProducto',
        'fotoProducto',
        'categoria', // FK hacia categoria.id
    ];

    // Relación: un producto pertenece a una categoría
    public function categoriaRelacion()
    {
        return $this->belongsTo(CategoriaModel::class, 'categoria', 'id');
    }

    // Accessor para obtener la URL de la foto (útil en vistas)
    public function getFotoUrlAttribute()
    {
        if (!$this->fotoProducto) {
            return null; // o una imagen por defecto: asset('images/default.png')
        }

        return asset('storage/productos/' . $this->fotoProducto);
    }

    // Opcional: cast para campos numéricos
    protected $casts = [
        'cantidadProducto' => 'integer',
        'precioProducto' => 'decimal:2',
    ];
}
