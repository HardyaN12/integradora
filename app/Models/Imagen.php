<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Imagen extends Model
{
    use HasFactory;
    protected $fillable = [
        'ruta', 'descripcion',
    ];

}
