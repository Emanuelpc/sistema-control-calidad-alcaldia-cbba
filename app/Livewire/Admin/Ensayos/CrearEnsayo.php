<?php

namespace App\Livewire\Admin\Ensayos;

use Livewire\Component;
use App\Models\Ensayo;
use App\Models\TipoEnsayo;

class CrearEnsayo extends Component
{
    public $descripcion;
    public $costo;
    public $estado = 'AC';
    public $tipo_id;

    protected $rules = [
        'descripcion' => 'required|min:3',
        'costo' => 'required|numeric',
        'estado' => 'required',
        'tipo_id' => 'required|exists:tipo_ensayo,num_sec',
    ];

    public function guardar()
    {
        $this->validate();

        $maxId = Ensayo::max('num_sec');
        $nextId = $maxId ? (int)$maxId + 1 : 1;

        Ensayo::create([
            'num_sec' => $nextId,
            'descripcion' => $this->descripcion,
            'costo' => $this->costo,
            'estado' => $this->estado,
            'num_sec_tensayo' => $this->tipo_id,
        ]);

        session()->flash('success', 'Ensayo creado correctamente.');
        return redirect()->route('admin.ensayos.index');
    }

    public function render()
    {
        $tipos = TipoEnsayo::where('estado', 'AC')->get();

        return view('livewire.admin.ensayos.crear-ensayo', [
            'tipos' => $tipos
        ])
        ->extends('layouts.user_type.auth')
        ->section('content');
    }
}
