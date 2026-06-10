<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre_usuario',    // Adaptado a tu diagrama
        'email',
        'password',
        'rol',               // Añadido para los roles del sistema
        'puntos_acumulados', // Añadido para el sistema de incentivos
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'puntos_acumulados' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relaciones de Eloquent
    |--------------------------------------------------------------------------
    */

    /**
     * Relación uno a uno con los datos extendidos del perfil del colaborador.
     */
    public function detalles()
    {
        return $this->hasOne(DetalleColaborador::class, 'usuario_id');
    }

    /**
     * Relación de muchos a muchos con las Actividades en las que participa.
     */
    public function actividades()
    {
        return $this->belongsToMany(Actividad::class, 'actividad_colaborador', 'usuario_id', 'actividad_id')
                    ->withPivot('asistio')
                    ->withTimestamps();
    }

    /**
     * Relación de uno a muchos con los Canjes de productos solicitados.
     */
    public function canjes()
    {
        return $this->hasMany(Canje::class, 'usuario_id');
    }
}