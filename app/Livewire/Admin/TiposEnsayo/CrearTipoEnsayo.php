<?php

namespace App\Livewire\Admin\TiposEnsayo;

use Livewire\Component;
use App\Models\TipoEnsayo;

class CrearTipoEnsayo extends Component
{
    public $descripcion;
    public $estado = 'AC'; // por defecto activo

    protected $rules = [
        'descripcion' => 'required|min:3',
        'estado' => 'required',
    ];

    public function guardar()
    {
        $this->validate();

        // Obtener el maximo num_sec actual y convertir a entero
        $maxId = TipoEnsayo::max('num_sec');
        $nextId = $maxId ? (int)$maxId + 1 : 1;

        TipoEnsayo::create([
            'num_sec' => $nextId,
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
        ]);

        session()->flash('success', 'Tipo de ensayo creado correctamente.');

        return redirect()->route('admin.tipos-ensayo.index');
    }

    public function render()
    {
        return view('livewire.admin.tipos-ensayo.crear-tipo-ensayo')
            ->extends('layouts.user_type.auth') // Layout principal
            ->section('content');               // Sección content
    }
}
