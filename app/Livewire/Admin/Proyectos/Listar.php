<?php

namespace App\Livewire\Admin\Proyectos;

use Livewire\Component;
use App\Models\Proyecto;
use App\Services\Core\AdministracionService;

class Listar extends Component
{
    protected $adminService;

    public function boot(AdministracionService $adminService) {
        $this->adminService = $adminService;
    }

    public function cambiarEstado($id) {
        $this->adminService->bajaProyecto($id);
        session()->flash('message', 'Estado del proyecto actualizado.');
    }

    public function render() {
        return view('livewire.admin.proyectos.listar', [
            'proyectos' => Proyecto::orderBy('num_sec', 'desc')->get()
        ])->extends('layouts.user_type.auth')->section('content');
    }
}