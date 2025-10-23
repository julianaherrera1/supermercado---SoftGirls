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
        'factura', 'producto', 'cantidad', 'precio'
    ];

    //Relaciones
      public function factura()
    {
        return $this->belongsTo(FacturaModel::class, 'factura', 'id');
    }

    public function producto()
    {
        return $this->belongsTo(ProductoModel::class, 'producto', 'id');
    }
}
