<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Services\Core\AdministracionService;
use App\Models\Laboratorista;

class Laboratoristas extends Component
{
    public $nombre;
    public $lista; // Usamos 'lista' para no conflictuar con nombres reservados

    protected $adminService;

    public function boot(AdministracionService $adminService)
    {
        $this->adminService = $adminService;
    }

    public function mount()
    {
        $this->cargar();
    }

    public function cargar()
    {
        $this->lista = Laboratorista::where('estado', 'AC')->get();
    }

    public function guardar()
    {
        $this->validate(['nombre' => 'required|min:3']);
        $this->adminService->guardarLaboratorista(['nombre' => $this->nombre]);
        $this->reset(['nombre']);
        $this->cargar();
    }

    public function eliminar($id)
    {
        $this->adminService->bajaLaboratorista($id);
        $this->cargar();
    }

    public function render()
    {
        return view('livewire.admin.laboratoristas')
            ->extends('layouts.user_type.auth')->section('content');
    }
}