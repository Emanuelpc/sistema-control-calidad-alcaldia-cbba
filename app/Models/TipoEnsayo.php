<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEnsayo extends Model
{
    // Nombre exacto de la tabla en tu BD (minúsculas)
    protected $table = 'tipo_ensayo';
    
    // Tu llave primaria personalizada
    protected $primaryKey = 'num_sec';
    
    // Desactivamos timestamps porque tu tabla no tiene created_at
    public $timestamps = false;

    protected $fillable = [
        'num_sec', 
        'descripcion', 
        'estado'
    ];
}