<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VsSolicitud extends Model
{
    protected $table = 'vs_solicitud';
    protected $primaryKey = 'num_sec';
    public $timestamps = false;
}
