<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoriaModel; // ✅ importante para que reconozca la relación

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
        'categoria',
    ];

    // ✅ Relación correcta: un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(CategoriaModel::class, 'categoria', 'id');
    }
}
