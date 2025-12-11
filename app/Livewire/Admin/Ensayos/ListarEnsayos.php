<?php

namespace App\Livewire\Admin\Ensayos;

use Livewire\Component;
use App\Models\Ensayo;

class ListarEnsayos extends Component
{
    public $search = '';

    public function render()
    {
        $ensayos = Ensayo::with('tipo')
                    ->where('descripcion', 'like', "%{$this->search}%")
                    ->orderBy('num_sec', 'desc')
                    ->get();

        return view('livewire.admin.ensayos.listar-ensayos', [
            'ensayos' => $ensayos
        ])
        ->extends('layouts.user_type.auth')
        ->section('content');
    }
    public function toggleEstado($id)
    {
        $ensayo = Ensayo::find($id);
        if ($ensayo) {
            $ensayo->estado = $ensayo->estado === 'AC' ? 'IN' : 'AC';
            $ensayo->save();
            session()->flash('success', 'Estado del ensayo actualizado.');
        }
    }

}
