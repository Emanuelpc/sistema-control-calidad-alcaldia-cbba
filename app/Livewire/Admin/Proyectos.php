<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\Core\AdministracionService;
use App\Models\Proyecto;

class Proyectos extends Component
{
    public $descripcion;
    public $proyectos;

    protected $adminService;

    public function boot(AdministracionService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function mount()
    {
        $this->cargarProyectos();
    }

    public function cargarProyectos()
    {
        $this->proyectos = Proyecto::where('estado', 'AC')->orderBy('num_sec', 'desc')->get();
    }

    public function guardar()
    {
        $this->validate(['descripcion' => 'required|min:3']);
        
        $this->adminService->guardarProyecto(['descripcion' => $this->descripcion]);
        
        $this->reset(['descripcion']);
        $this->cargarProyectos();
        session()->flash('message', 'Proyecto creado correctamente.');
    }

    public function eliminar($id)
    {
        $this->adminService->bajaProyecto($id);
        $this->cargarProyectos();
    }

    public function render()
    {
        return view('livewire.admin.proyectos')
            ->extends('layouts.user_type.auth')->section('content');
    }
}