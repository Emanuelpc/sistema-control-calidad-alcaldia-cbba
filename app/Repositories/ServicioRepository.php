<?php

namespace App\Repositories;

use App\Models\Servicio;
use App\Models\EnsayoSolicitado;
use Illuminate\Support\Facades\DB;

class ServicioRepository
{
    public function getNextId($table)
    {
        // Buscamos 'num_sec' en minúsculas
        $max = DB::table($table)->max('num_sec');
        return $max ? ($max + 1) : 1;
    }

    public function createHeader(array $data)
    {
        return Servicio::create($data);
    }

    public function createDetail(array $data)
    {
        return EnsayoSolicitado::create($data);
    }
    
    public function getAllActive()
    {
        return Servicio::where('estado', 'AC')->orderBy('fecha_sol', 'desc')->get();
    }
}