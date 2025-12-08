<?php

namespace App\Livewire\Admin\Responsables;

use Livewire\Component;
use App\Models\Responsable;
use App\Services\Core\AdministracionService;

class Editar extends Component
{
    public $num_sec, $nombre, $ci, $documento;
    protected $adminService;

    public function boot(AdministracionService $adminService) {
        $this->adminService = $adminService;
    }

    public function mount($id) {
        // Cargar los datos del responsable a editar
        $r = Responsable::findOrFail($id);
        $this->num_sec = $r->num_sec;
        $this->nombre = $r->nombre;
        $this->ci = $r->ci;
        $this->documento = $r->documento;
    }

    public function guardar() {
        // Validaciones
        $this->validate([
            'nombre' => 'required|min:3',
            'ci' => 'required',
            'documento' => 'nullable'
        ]);

        // Llamada al servicio para actualizar
        $this->adminService->actualizarResponsable($this->num_sec, [
            'nombre' => $this->nombre,
            'ci' => $this->ci,
            'documento' => $this->documento
        ]);

        session()->flash('message', 'Responsable actualizado correctamente.');
        return redirect()->route('admin.responsables.index');
    }

    public function render() {
        return view('livewire.admin.responsables.editar')
            ->extends('layouts.user_type.auth')->section('content');
    }
}