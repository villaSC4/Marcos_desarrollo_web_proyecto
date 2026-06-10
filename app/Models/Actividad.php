<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    use HasFactory;

    protected $table = 'actividades';

    protected $fillable = [
        'nombre',
        'descripcion',
        'puntos_otorgados',
        'fecha_activity',
        'estado'
    ];

    // Relación de muchos a muchos con los Usuarios (Colaboradores) que participan
    public function usuarios()
    {
        return $this->belongsToMany(User::class, 'actividad_colaborador', 'actividad_id', 'usuario_id')
                    ->withPivot('asistio')
                    ->withTimestamps();
    }
}