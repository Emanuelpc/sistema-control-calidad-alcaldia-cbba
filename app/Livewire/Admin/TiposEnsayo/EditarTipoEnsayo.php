<?php

namespace App\Livewire\Admin\TiposEnsayo;

use Livewire\Component;
use App\Models\TipoEnsayo;

class EditarTipoEnsayo extends Component
{
    public $tipo;
    public $descripcion;
    public $estado;

    protected $rules = [
        'descripcion' => 'required|min:3',
        'estado' => 'required',
    ];

    public function mount($id)
    {
        $this->tipo = TipoEnsayo::findOrFail($id);
        $this->descripcion = $this->tipo->DESCRIPCION;
        $this->estado = $this->tipo->ESTADO;
    }

    public function actualizar()
    {
        $this->validate();

        $this->tipo->update([
            'descripcion' => $this->descripcion,
            'estado' => $this->estado,
        ]);

        session()->flash('success', 'Tipo de ensayo actualizado.');

        return redirect()->route('admin.tipos-ensayo.index');
    }

    public function render()
    {
        return view('livewire.admin.tipos-ensayo.editar-tipo-ensayo')
            ->extends('layouts.user_type.auth') // Hereda el layout principal
            ->section('content'); // Coloca el contenido dentro de la sección 'content'
    }

}
