<?php

namespace App\Livewire\Admin\Proyectos;

use Livewire\Component;
use App\Models\Proyecto;
use App\Models\RespProy;
use App\Models\Responsable;
use App\Services\Core\AdministracionService;

class Editar extends Component
{
    public $num_sec, $estructura, $descripcion, $documento, $responsable_id;
    protected $adminService;

    public function boot(AdministracionService $adminService) {
        $this->adminService = $adminService;
    }

    public function mount($id) {
        $p = Proyecto::findOrFail($id);
        $this->num_sec = $p->num_sec;
        $this->estructura = $p->estructura;
        $this->descripcion = $p->descripcion;
        $this->documento = $p->documento;

        // Recuperar el responsable actual desde la tabla intermedia
        $asignacion = RespProy::where('num_sec_proy', $id)
                        ->where('estado', 'AC')
                        ->latest('fecha')
                        ->first();
        
        if ($asignacion) {
            $this->responsable_id = $asignacion->num_sec_resp;
        }
    }

    public function guardar() {
        $this->validate([
            'descripcion' => 'required|min:3',
            'estructura'  => 'nullable|max:10',
            'documento'   => 'nullable|max:60',
            'responsable_id' => 'required'
        ]);

        $this->adminService->actualizarProyecto($this->num_sec, [
            'estructura' => $this->estructura,
            'descripcion' => $this->descripcion,
            'documento' => $this->documento,
            'responsable_id' => $this->responsable_id
        ]);

        session()->flash('message', 'Proyecto actualizado correctamente.');
        return redirect()->route('admin.proyectos.index');
    }

    public function render() {
        return view('livewire.admin.proyectos.editar', [
            'responsables' => Responsable::where('estado', 'AC')->orderBy('nombre')->get()
        ])->extends('layouts.user_type.auth')->section('content');
    }
}