<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    protected $table = producto; 
    protected $primaryKey = 'id';
    public $timestamps = true;

    public function belongsCategory(){
        return $this->belongsTo(CategoriaModel::class, 'categoria', 'id');
    }


}
