<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Imagen;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre', 'descripcion', 'precio',
    ];

    public function imagenes(){
        return $this->hasMany('App\Models\Imagen');
    }
}
