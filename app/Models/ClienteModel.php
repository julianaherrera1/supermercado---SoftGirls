<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;

    protected $table = 'cliente';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'nombreCliente',
        'cedulaCliente',
        'direccionCliente',
        'telefonoCliente',
        'generoCliente',
        'fotoCliente',
    ];

    // Si quieres, puedes agregar un accesor para la foto:
    public function getFotoUrlAttribute()
    {
        if (!$this->fotoCliente) return null;
        return asset('storage/clientes/' . $this->fotoCliente);
    }
}
