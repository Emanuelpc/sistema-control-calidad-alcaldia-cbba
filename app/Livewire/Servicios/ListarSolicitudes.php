<?php

namespace App\Livewire\Servicios;

use Livewire\Component;
use App\Models\VsSolicitud;

class ListarSolicitudes extends Component
{
    public function render()
{
    return view('livewire.servicios.listar-solicitudes', [
        'solicitudes' => \DB::table('vs_solicitud')
            ->orderBy('num_sec', 'desc')
            ->get()
    ])
    ->extends('layouts.user_type.auth')
    ->section('content');
}

}
