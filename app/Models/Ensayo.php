<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ensayo extends Model
{
    protected $table = 'ensayos';
    protected $primaryKey = 'num_sec';
    public $timestamps = false;
}