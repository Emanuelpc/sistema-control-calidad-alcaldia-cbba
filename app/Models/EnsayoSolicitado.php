<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnsayoSolicitado extends Model
{
    protected $table = 'ensayos_solicitados';
    protected $primaryKey = 'num_sec';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = [
        'num_sec', 'num_sec_ensayo', 'num_sec_servicio', 'cantidad', 'estado'
    ];
}