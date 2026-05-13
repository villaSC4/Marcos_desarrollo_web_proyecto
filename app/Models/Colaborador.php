<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;

class Colaborador extends Authenticatable
{
    use HasFactory, Notifiable;

   
    protected $table = 'colaboradores';


    protected $fillable = [
        'nombres',
        'apellidos',
        'fecha_nacimiento',
        'genero',
        'email',
        'password',
        'puntos_acumulados',
        'estado',
    ];

    /**
     * Oculta datos sensibles de sesiones y JSONs.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

   
    protected function casts(): array
    {
        return [
            'fecha_nacimiento'  => 'date',
            'estado'            => 'boolean',
            'puntos_acumulados' => 'integer',
            'password'          => 'hashed', 
        ];
    }
}