<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'nombre',
        'descripcion',
        'costo_puntos',
        'stock',
        'imagen'
    ];

    // Un producto puede tener muchos canjes registrados
    public function canjes()
    {
        return $this->hasMany(Canje::class, 'producto_id');
    }
}