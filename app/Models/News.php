<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class News extends Model
{
    protected $table = 'news'; 

    protected $fillable = [
        'titulo',
        'slug',
        'resumen',
        'contenido',
        'imagen_portada',
        'publicado',
        'fecha_publicacion',
    ];

    protected $casts = [
        'publicado' => 'boolean',
        'fecha_publicacion' => 'date',
    ];
}
