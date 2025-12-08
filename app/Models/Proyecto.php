<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    protected $table = 'proyectos';
    protected $primaryKey = 'num_sec';
    public $timestamps = false;

    protected $fillable = ['num_sec', 'estructura', 'descripcion', 'documento', 'estado', 'fecha'];
}