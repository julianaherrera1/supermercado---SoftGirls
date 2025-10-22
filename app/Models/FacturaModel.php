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
        // 'cliente_id', 'fecha', 'total', ...
    ];

    // Relación ejemplo
    public function detalles()
    {
        return $this->hasMany(DetalleModel::class, 'factura_id', 'id');
    }
}
