<?php

namespace App\Livewire\Admin\Laboratoristas;

use Livewire\Component;
use App\Models\Laboratorista;

class Editar extends Component
{
    public $num_sec, $nombre, $usr, $pwd, $tipo;

    public function mount($id) {
        $lab = Laboratorista::findOrFail($id);
        $this->num_sec = $lab->num_sec;
        $this->nombre = $lab->nombre;
        $this->usr = $lab->usr;
        // NO cargamos la contraseña antigua por seguridad y para detectar cambios
        $this->pwd = ''; 
        $this->tipo = $lab->tipo;
    }

    public function guardar() {
        // 1. Validación condicional
        $rules = [
            'nombre' => 'required|min:3',
            'usr' => 'required',
            'tipo' => 'required'
        ];

        // Solo validamos contraseña si el usuario escribió algo
        if (!empty($this->pwd)) {
            $rules['pwd'] = 'min:3'; 
        }

        $this->validate($rules);
        
        // 2. Preparar los datos a actualizar
        $datos = [
            'nombre' => $this->nombre,
            'usr' => $this->usr,
            'tipo' => $this->tipo
        ];

        // 3. Solo agregamos la contraseña al array si se escribió una nueva
        if (!empty($this->pwd)) {
            $datos['pwd'] = $this->pwd;
        }

        // 4. Actualizar en Base de Datos
        Laboratorista::where('num_sec', $this->num_sec)->update($datos);

        session()->flash('message', 'Laboratorista actualizado correctamente.');
        return redirect()->route('admin.laboratoristas.index');
    }
    // Personalizar mensajes de error en Español
    protected $messages = [
        'nombre.required' => 'El nombre es obligatorio.',
        'nombre.min'      => 'El nombre debe tener al menos 3 caracteres.',
        'usr.required'    => 'El campo usuario es obligatorio.',
        'tipo.required'   => 'Debe seleccionar un tipo de permiso.',
        'pwd.min'         => 'La nueva contraseña debe tener al menos 4 caracteres.',
    ];

    public function render() {
        return view('livewire.admin.laboratoristas.editar')
            ->extends('layouts.user_type.auth')->section('content');
    }
}