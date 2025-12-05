<?php

namespace App\Livewire\Admin\Laboratoristas;

use Livewire\Component;
use App\Services\Core\AdministracionService;

class Crear extends Component
{
    public $nombre, $usr, $pwd, $tipo = 1;
    protected $adminService;

    public function boot(AdministracionService $adminService) {
        $this->adminService = $adminService;
    }

    public function guardar() {
        $this->validate([
            'nombre' => 'required|min:3',
            'usr' => 'required',
            'pwd' => 'required',
            'tipo' => 'required'
        ]);

        $this->adminService->guardarLaboratorista([
            'nombre' => $this->nombre, 'usr' => $this->usr,
            'pwd' => $this->pwd, 'tipo' => $this->tipo
        ]);

        session()->flash('message', 'Laboratorista creado exitosamente.');
        return redirect()->route('admin.laboratoristas.index');
    }
    // Personalizar mensajes de error en Español
    protected $messages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.min'      => 'El nombre debe tener al menos 3 caracteres.',
        'usr.required'    => 'El campo usuario es obligatorio.',
        'pwd.required'    => 'La contraseña es obligatoria.',
        'tipo.required'   => 'Debe seleccionar un tipo de permiso.',
    ];

    public function render() {
        return view('livewire.admin.laboratoristas.crear')
            ->extends('layouts.user_type.auth')->section('content');
    }
}