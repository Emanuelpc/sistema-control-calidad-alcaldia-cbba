<?php

namespace App\Livewire\Admin\Ensayos;

use Livewire\Component;
use App\Models\Ensayo;
use App\Models\TipoEnsayo;

class EditarEnsayo extends Component
{
    public $ensayo;
    public $descripcion;
    public $costo;
    public $estado;
    public $tipo_id;

    protected $rules = [
        'descripcion' => 'required|min:3',
        'costo' => 'required|numeric',
        'estado' => 'required',
        'tipo_id' => 'required|exists:tipo_ensayo,num_sec',
    ];

    public function mount($id)
    {
        $this->ensayo = Ensayo::findOrFail($id);
        $this->descripcion = $this->ensayo->descripcion;
        $this->costo = $this->ensayo->costo;
        $this->estado = $this->ensayo->estado;
        $this->tipo_id = $this->ensayo->num_sec_tensayo;
    }

    public function actualizar()
    {
        $this->validate();

        $this->ensayo->update([
            'descripcion' => $this->descripcion,
            'costo' => $this->costo,
            'estado' => $this->estado,
            'num_sec_tensayo' => $this->tipo_id,
        ]);

        session()->flash('success', 'Ensayo actualizado correctamente.');
        return redirect()->route('admin.ensayos.index');
    }

    public function render()
    {
        $tipos = TipoEnsayo::where('estado', 'AC')->get();

        return view('livewire.admin.ensayos.editar-ensayo', [
            'tipos' => $tipos
        ])
        ->extends('layouts.user_type.auth')
        ->section('content');
    }
}
