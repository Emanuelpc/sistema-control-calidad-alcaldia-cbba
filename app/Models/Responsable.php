<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    protected $table = 'responsables';
    protected $primaryKey = 'num_sec';
    public $timestamps = false;

    protected $fillable = ['num_sec', 'nombre', 'estado', 'ci', 'documento'];
}