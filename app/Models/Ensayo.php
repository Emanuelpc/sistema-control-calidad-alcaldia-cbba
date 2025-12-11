<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ensayo extends Model
{
    protected $table = 'ensayos';
    protected $primaryKey = 'num_sec';
    public $incrementing = false; // si vas a generar num_sec manualmente
    public $timestamps = false;

    protected $fillable = [
        'num_sec',
        'descripcion',
        'costo',
        'estado',
        'num_sec_tensayo'
    ];

    // Relación con TipoEnsayo
    public function tipo()
    {
        return $this->belongsTo(TipoEnsayo::class, 'num_sec_tensayo', 'num_sec');
    }
}
