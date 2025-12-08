<?php

namespace App\Livewire\Admin\Proyectos;

use Livewire\Component;
use App\Services\Core\AdministracionService;
use App\Models\Responsable;

class Crear extends Component
{
    public $estructura, $descripcion, $documento, $responsable_id;
    protected $adminService;

    // Mensajes personalizados
    protected $messages = [
        'descripcion.required' => 'La descripción es obligatoria.',
        'responsable_id.required' => 'Debe seleccionar un responsable.',
    ];

    public function boot(AdministracionService $adminService) {
        $this->adminService = $adminService;
    }

    public function guardar() {
        $this->validate([
            'descripcion' => 'required|min:3',
            'estructura'  => 'nullable|max:10',
            'documento'   => 'nullable|max:60',
            'responsable_id' => 'required'
        ]);

        $this->adminService->guardarProyecto([
            'estructura' => $this->estructura,
            'descripcion' => $this->descripcion,
            'documento' => $this->documento,
            'responsable_id' => $this->responsable_id
        ]);

        session()->flash('message', 'Proyecto creado correctamente.');
        return redirect()->route('admin.proyectos.index');
    }

    public function render() {
        return view('livewire.admin.proyectos.crear', [
            'responsables' => Responsable::where('estado', 'AC')->orderBy('nombre')->get()
        ])->extends('layouts.user_type.auth')->section('content');
    }
}