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
            // Generamos el ID
            $id = $this->repo->getNextId('laboratoristas');
            
            // Creamos el registro con TODOS los campos
            return Laboratorista::create([
                'num_sec' => $id,
                'nombre' => $data['nombre'],
                'usr' => $data['usr'],      // <--- Antes faltaba esto
                'pwd' => $data['pwd'],      // <--- Antes faltaba esto
                'tipo' => $data['tipo'],    // <--- Antes faltaba esto
                'estado' => 'AC'
            ]);
        });
    }

    // Reemplaza o agrega esto
    public function alternarEstadoLaboratorista($id)
    {
        $lab = Laboratorista::find($id);
        
        if ($lab) {
            // Si es AC lo vuelve IN, si es IN lo vuelve AC
            $nuevoEstado = ($lab->estado === 'AC') ? 'IN' : 'AC';
            $lab->update(['estado' => $nuevoEstado]);
        }
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