<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaModel extends Model
{
    use HasFactory;

    protected $table = 'factura';
    public $timestamps = true;

     protected $fillable = [
        'cliente', 'fechaFactura', 'total'
    ];

    // Relaciones
    public function cliente()
    {
        return $this->belongsTo(ClienteModel::class, 'cliente', 'id');
    }

    public function detalles()
    {
        return $this->hasMany(DetalleModel::class, 'factura', 'id');
    }
}
