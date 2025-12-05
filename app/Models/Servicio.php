<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios'; // Minúsculas
    protected $primaryKey = 'num_sec'; // Minúsculas
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'num_sec', 'num_sec_proy', 'empresa', 'ubicacion', 
        'fecha_sol', 'hra_sol', 'obs_solicitante', 'estado', 
        'tipo_servicio', 'fecha_reg'
    ];

    public function detalles()
    {
        return $this->hasMany(EnsayoSolicitado::class, 'num_sec_servicio', 'num_sec');
    }
}