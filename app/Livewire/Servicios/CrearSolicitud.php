<?php

namespace App\Livewire\Servicios;

use Livewire\Component;
use App\Services\Core\ServicioService;
use App\Models\Proyecto;
use App\Models\Ensayo;
use Carbon\Carbon;

class CrearSolicitud extends Component
{
    // Variables del Formulario (Minúsculas)
    public $num_sec_proy;
    public $empresa;
    public $ubicacion;
    public $fecha_sol;
    public $hra_sol;
    public $obs_solicitante;
    
    // Variables Detalle
    public $ensayo_id;
    public $cantidad = 1;
    public $items = []; 

    protected $servicioService;

    public function boot(ServicioService $servicioService)
    {
        $this->servicioService = $servicioService;
    }

    public function mount()
    {
        $this->fecha_sol = Carbon::now()->format('Y-m-d');
        $this->hra_sol = Carbon::now()->format('H:i');
    }

    public function agregarItem()
    {
        $this->validate([
            'ensayo_id' => 'required',
            'cantidad' => 'required|min:1'
        ]);
        
        $ensayo = Ensayo::find($this->ensayo_id);
        
        if($ensayo){
            $this->items[] = [
                'id' => $ensayo->num_sec, // Ojo: propiedad del modelo en minúsculas
                'descripcion' => $ensayo->descripcion,
                'cantidad' => $this->cantidad,
                'costo' => $ensayo->costo
            ];
            $this->reset(['ensayo_id', 'cantidad']);
        }
    }

    public function eliminarItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function guardar()
    {
        try {
            $this->servicioService->crearSolicitudCompleta([
                'num_sec_proy' => $this->num_sec_proy,
                'empresa' => $this->empresa,
                'ubicacion' => $this->ubicacion,
                'fecha_sol' => $this->fecha_sol,
                'hra_sol' => $this->hra_sol,
                'obs_solicitante' => $this->obs_solicitante,
                'items' => $this->items
            ]);

            session()->flash('message', 'Solicitud creada correctamente.');
            
            $this->reset(['num_sec_proy', 'empresa', 'ubicacion', 'items', 'obs_solicitante']);
            $this->mount();

        } catch (\Exception $e) {
            $this->addError('general', 'Error al guardar: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.servicios.crear-solicitud', [
            'proyectos' => Proyecto::where('estado', 'AC')->get(),
            'ensayos' => Ensayo::where('estado', 'AC')->orderBy('descripcion')->get(),
        ])
        // Usamos extends para adaptarnos a tu plantilla Soft UI
        ->extends('layouts.user_type.auth') 
        ->section('content');
    }
}