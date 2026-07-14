<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticiaMultimedia extends Model
{
    use HasFactory;

    protected $table = 'noticia_multimedia';

    protected $fillable = [
        'noticia_id',
        'ruta_archivo',
        'tipo_archivo',
        'orden'
    ];

 
    public function noticia()
    {
        return $this->belongsTo(News::class, 'noticia_id');
    }
}