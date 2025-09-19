<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaModel extends Model
{
    protected $table = 'categoria'; //Nombre de la tabla
    protected $primaryKey = 'id'; //Llave primaria de la tabla
    public $timestamps = true; // Activar los temporizadores de registros

    public function hasProduct(){
        return $this->hasMany(ProductoModel::class);

    }


}
