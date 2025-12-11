<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoEnsayo extends Model
{
    protected $table = 'tipo_ensayo';
    protected $primaryKey = 'num_sec';
    public $timestamps = false;

    protected $fillable = [
        'num_sec',
        'descripcion',
        'estado',
    ];
}
