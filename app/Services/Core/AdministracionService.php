<?php

namespace App\Services\Core;

use App\Repositories\ServicioRepository;
use App\Models\Proyecto;
use App\Models\Laboratorista;
use App\Models\Ensayo;
use App\Models\Responsable;
use App\Models\RespProy;
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
            // 1. Crear el Proyecto
            $idProy = $this->repo->getNextId('proyectos');
            
            $proyecto = Proyecto::create([
                'num_sec' => $idProy,
                'estructura' => $data['estructura'] ?? null,
                'descripcion' => $data['descripcion'],
                'documento' => $data['documento'] ?? null,
                'estado' => 'AC',
                'fecha' => now()
            ]);

            // 2. Asignar Responsable (Tabla Intermedia)
            if (!empty($data['responsable_id'])) {
                $idRespProy = $this->repo->getNextId('resp_proy');
                
                RespProy::create([
                    'num_sec' => $idRespProy,
                    'num_sec_proy' => $proyecto->num_sec,
                    'num_sec_resp' => $data['responsable_id'],
                    'fecha' => now(),
                    'estado' => 'AC'
                ]);
            }

            return $proyecto;
        });
    }

    public function actualizarProyecto($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            // 1. Actualizar datos básicos
            $proyecto = Proyecto::findOrFail($id);
            $proyecto->update([
                'estructura' => $data['estructura'],
                'descripcion' => $data['descripcion'],
                'documento' => $data['documento']
            ]);

            // 2. Actualizar Responsable
            // Primero desactivamos el anterior (si existía)
            RespProy::where('num_sec_proy', $id)->update(['estado' => 'IN']);

            // Creamos la nueva asignación
            if (!empty($data['responsable_id'])) {
                $idRespProy = $this->repo->getNextId('resp_proy');
                RespProy::create([
                    'num_sec' => $idRespProy,
                    'num_sec_proy' => $id,
                    'num_sec_resp' => $data['responsable_id'],
                    'fecha' => now(),
                    'estado' => 'AC'
                ]);
            }
        });
    }

    public function bajaProyecto($id)
    {
        $p = Proyecto::find($id);
        if($p) {
            $nuevoEstado = ($p->estado === 'AC') ? 'IN' : 'AC';
            $p->update(['estado' => $nuevoEstado]);
        }
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
    // --- MÓDULO DE RESPONSABLES (INGENIEROS/ARQUITECTOS) ---

    public function guardarResponsable(array $data)
    {
        return DB::transaction(function () use ($data) {
            $id = $this->repo->getNextId('responsables');
            return \App\Models\Responsable::create([
                'num_sec' => $id,
                'nombre' => $data['nombre'],
                'ci' => $data['ci'],
                'documento' => $data['documento'] ?? null,
                'estado' => 'AC'
            ]);
        });
    }

    public function bajaResponsable($id)
    {
        $r = \App\Models\Responsable::find($id);
        if($r) {
            $nuevoEstado = ($r->estado === 'AC') ? 'IN' : 'AC';
            $r->update(['estado' => $nuevoEstado]);
        }
    }
    
    public function actualizarResponsable($id, array $data)
    {
        $r = \App\Models\Responsable::findOrFail($id);
        $r->update([
            'nombre' => $data['nombre'],
            'ci' => $data['ci'],
            'documento' => $data['documento']
        ]);
    }
}