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
        'direccion',
        'fecha_activity',
        'estado'
    ];

    public function colaboradores()
    {
        return $this->belongsToMany(Colaborador::class, 'actividad_colaborador', 'actividad_id', 'usuario_id')
                    ->withPivot('asistio')
                    ->withTimestamps();
    }
}