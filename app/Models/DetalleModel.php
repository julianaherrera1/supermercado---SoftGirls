<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleModel extends Model
{
    use HasFactory;

    protected $table = 'detalle';
    public $timestamps = true;

    // Rellena estos campos según tu tabla detalle
    protected $fillable = [
        // 'factura_id', 'producto_id', 'cantidad', 'precio_unitario', ...
    ];
}
