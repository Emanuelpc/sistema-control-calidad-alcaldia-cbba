<?php

namespace App\Services\Core;

use App\Repositories\ServicioRepository;
use App\Services\Validations\ServicioValidator;
use Illuminate\Support\Facades\DB;

class ServicioService
{
    protected $repo;
    protected $validator;

    public function __construct(ServicioRepository $repo, ServicioValidator $validator)
    {
        $this->repo = $repo;
        $this->validator = $validator;
    }

    public function crearSolicitudCompleta(array $datos)
    {
        // 1. Validar
        $this->validator->validateCreate($datos);

        return DB::transaction(function () use ($datos) {
            // 2. Generar ID y Guardar Cabecera (Todo en minúsculas)
            $idServicio = $this->repo->getNextId('servicios');
            
            $datosServicio = [
                'num_sec' => $idServicio,
                'num_sec_proy' => $datos['num_sec_proy'],
                'empresa' => $datos['empresa'],
                'ubicacion' => $datos['ubicacion'],
                'fecha_sol' => $datos['fecha_sol'],
                'hra_sol' => $datos['hra_sol'] ?? date('H:i'),
                'obs_solicitante' => $datos['obs_solicitante'] ?? null,
                'estado' => 'AC',
                'tipo_servicio' => '0', 
                'fecha_reg' => now()
            ];

            $servicio = $this->repo->createHeader($datosServicio);

            // 3. Guardar Detalles
            foreach ($datos['items'] as $item) {
                $idDetalle = $this->repo->getNextId('ensayos_solicitados');
                
                $this->repo->createDetail([
                    'num_sec' => $idDetalle,
                    'num_sec_servicio' => $servicio->num_sec,
                    'num_sec_ensayo' => $item['id'],
                    'cantidad' => $item['cantidad'],
                    'estado' => 'AC'
                ]);
            }
            return $servicio;
        });
    }
}