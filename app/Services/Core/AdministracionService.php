<?php

namespace App\Services\Core;

use App\Repositories\ServicioRepository;
use App\Models\Proyecto;
use App\Models\Laboratorista;
use App\Models\Ensayo;
use Illuminate\Support\Facades\DB;

class AdministracionService
{
    protected $repo;

    public function __construct(ServicioRepository $repo)
    {
        $this->repo = $repo;
    }

    // --- PROYECTOS ---
    public function guardarProyecto(array $data)
    {
        return DB::transaction(function () use ($data) {
            $id = $this->repo->getNextId('proyectos');
            return Proyecto::create([
                'num_sec' => $id,
                'descripcion' => $data['descripcion'],
                'estado' => 'AC'
            ]);
        });
    }

    public function bajaProyecto($id)
    {
        $p = Proyecto::find($id);
        if($p) $p->update(['estado' => 'IN']);
    }

    // --- LABORATORISTAS ---
    public function guardarLaboratorista(array $data)
    {
        return DB::transaction(function () use ($data) {
            $id = $this->repo->getNextId('laboratoristas');
            return Laboratorista::create([
                'num_sec' => $id,
                'nombre' => $data['nombre'],
                'tipo' => 1, // Por defecto
                'estado' => 'AC'
            ]);
        });
    }

    public function bajaLaboratorista($id)
    {
        $l = Laboratorista::find($id);
        if($l) $l->update(['estado' => 'IN']);
    }

    // --- ENSAYOS ---
    public function guardarEnsayo(array $data)
    {
        return DB::transaction(function () use ($data) {
            $id = $this->repo->getNextId('ensayos');
            return Ensayo::create([
                'num_sec' => $id,
                'descripcion' => $data['descripcion'],
                'costo' => $data['costo'],
                'num_sec_tensayo' => $data['tipo_id'], // FK Tipo Ensayo
                'estado' => 'AC'
            ]);
        });
    }
    
    public function bajaEnsayo($id)
    {
        $e = Ensayo::find($id);
        if($e) $e->update(['estado' => 'IN']);
    }
}