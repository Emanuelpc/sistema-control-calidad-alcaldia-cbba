<?php

namespace App\Livewire\Admin\Laboratoristas;

use Livewire\Component;
use App\Models\Laboratorista;
use App\Services\Core\AdministracionService;

class Listar extends Component
{
    protected $adminService;

    public function boot(AdministracionService $adminService)
    {
        $this->adminService = $adminService;
    }

    // Cambiamos el nombre del método para que tenga sentido
    public function cambiarEstado($id)
    {
        $this->adminService->alternarEstadoLaboratorista($id);
        session()->flash('message', 'Estado del personal actualizado.');
    }

    public function render()
    {
        return view('livewire.admin.laboratoristas.listar', [
            // CORRECCIÓN: Quitamos el where('estado', 'AC') para ver todos
            'lista' => Laboratorista::orderBy('num_sec', 'desc')->get()
        ])->extends('layouts.user_type.auth')->section('content');
    }
}