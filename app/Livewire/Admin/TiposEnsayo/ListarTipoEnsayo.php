<?php

namespace App\Livewire\Admin\TiposEnsayo;

use Livewire\Component;
use App\Models\TipoEnsayo;

class ListarTipoEnsayo extends Component
{
    public $search = '';

    public function render()
    {
        // Asegúrate que el modelo tenga protected $table = 'tipo_ensayo';
        $tipos = TipoEnsayo::where('descripcion', 'like', "%{$this->search}%")
                           ->orderBy('num_sec', 'desc')
                           ->get();

        return view('livewire.admin.tipos-ensayo.listar-tipo-ensayo', [
            'tipos' => $tipos
        ])
        ->extends('layouts.user_type.auth') // Usa el layout principal
        ->section('content'); // Coloca el contenido en la sección 'content'
    }
}
