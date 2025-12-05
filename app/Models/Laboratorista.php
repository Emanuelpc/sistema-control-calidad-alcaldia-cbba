<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laboratorista extends Model
{
    // Configuración para base de datos Legacy (Minúsculas)
    protected $table = 'laboratoristas';
    protected $primaryKey = 'num_sec';
    public $timestamps = false; // Tu tabla no tiene created_at/updated_at

    protected $fillable = [
        'num_sec', 
        'nombre', 
        'estado', 
        'usr', 
        'pwd', 
        'tipo'
    ];
}