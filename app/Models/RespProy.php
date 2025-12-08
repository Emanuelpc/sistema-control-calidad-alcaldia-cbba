<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RespProy extends Model
{
    protected $table = 'resp_proy';
    protected $primaryKey = 'num_sec';
    public $timestamps = false;

    protected $fillable = ['num_sec', 'num_sec_proy', 'num_sec_resp', 'fecha', 'estado'];
}