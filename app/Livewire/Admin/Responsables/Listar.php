<?php
namespace App\Livewire\Admin\Responsables;
use Livewire\Component;
use App\Models\Responsable;
use App\Services\Core\AdministracionService;

class Listar extends Component {
    protected $adminService;
    public function boot(AdministracionService $s) { $this->adminService = $s; }
    
    public function cambiarEstado($id) {
        $this->adminService->bajaResponsable($id);
    }

    public function render() {
        return view('livewire.admin.responsables.listar', [
            'lista' => Responsable::orderBy('num_sec', 'desc')->get()
        ])->extends('layouts.user_type.auth')->section('content');
    }
}