<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\Core\AdministracionService;
use App\Models\Ensayo;
use App\Models\TipoEnsayo; // Asegúrate de tener este modelo (ver abajo)

class Ensayos extends Component
{
    public $descripcion, $costo, $tipo_id;
    public $ensayos;

    protected $adminService;

    public function boot(AdministracionService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function mount()
    {
        $this->cargar();
        // Valor por defecto para tipo (ej: 1 = SUELOS)
        $this->tipo_id = 1; 
    }

    public function cargar()
    {
        $this->ensayos = Ensayo::where('estado', 'AC')->get();
    }

    public function guardar()
    {
        $this->validate([
            'descripcion' => 'required',
            'costo' => 'required|numeric',
            'tipo_id' => 'required'
        ]);
        
        $this->adminService->guardarEnsayo([
            'descripcion' => $this->descripcion,
            'costo' => $this->costo,
            'tipo_id' => $this->tipo_id
        ]);
        
        $this->reset(['descripcion', 'costo']);
        $this->cargar();
    }

    public function eliminar($id)
    {
        $this->adminService->bajaEnsayo($id);
        $this->cargar();
    }

    public function render()
    {
        return view('livewire.admin.ensayos')
            ->extends('layouts.user_type.auth')->section('content');
    }
}