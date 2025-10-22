<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CategoriaModel extends Model
{
    use HasFactory;

    protected $table = 'categoria'; // nombre EXACTO de la tabla en la BD
    protected $primaryKey = 'id';
    public $timestamps = true;

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'nombreCategoria',
        'descripcion',
    ];

    // Relación: una categoría tiene muchos productos
    public function productos()
    {
        return $this->hasMany(ProductoModel::class, 'categoria', 'id');
    }
}
