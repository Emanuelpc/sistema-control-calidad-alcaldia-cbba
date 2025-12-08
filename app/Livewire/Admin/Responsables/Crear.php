<?php
namespace App\Livewire\Admin\Responsables;
use Livewire\Component;
use App\Services\Core\AdministracionService;

class Crear extends Component {
    public $nombre, $ci, $documento;
    protected $adminService;
    
    public function boot(AdministracionService $s) { $this->adminService = $s; }

    public function guardar() {
        $this->validate(['nombre' => 'required|min:3', 'ci' => 'required']);
        $this->adminService->guardarResponsable([
            'nombre' => $this->nombre, 'ci' => $this->ci, 'documento' => $this->documento
        ]);
        session()->flash('message', 'Responsable registrado.');
        return redirect()->route('admin.responsables.index');
    }

    public function render() {
        return view('livewire.admin.responsables.crear')
            ->extends('layouts.user_type.auth')->section('content');
    }
}