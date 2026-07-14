<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleColaborador extends Model
{
    use HasFactory;

    protected $table = 'detalles_colaboradores';

    protected $fillable = [
        'usuario_id',
        'apellidos',
        'fecha_nacimiento',
        'genero'
    ];

 
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}