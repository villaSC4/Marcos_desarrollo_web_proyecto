<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canje extends Model
{
    use HasFactory;

    protected $table = 'canjes';

    protected $fillable = [
        'usuario_id',
        'producto_id',
        'puntos_utilizados',
        'estado'
    ];

    
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}