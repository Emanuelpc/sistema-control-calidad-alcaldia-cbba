<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Personal de Laboratorio</h6>
                    {{-- BOTÓN AGREGAR: Redirige al componente Crear --}}
                    <a href="{{ route('admin.laboratoristas.crear') }}" class="btn bg-gradient-primary btn-sm mb-0">
                        <i class="fas fa-plus me-2"></i>Agregar Laboratorista
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Nombre</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuario</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipo</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lista as $lab)
                                <tr>
                                    <td class="ps-4">
                                        <h6 class="mb-0 text-sm">{{ $lab->nombre }}</h6>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $lab->usr }}</p>
                                    </td>
                                    <td class="text-center">
                                        {{-- Badge Dinámico: Verde si es AC, Gris si es IN --}}
                                        <span class="badge badge-sm bg-gradient-{{ $lab->estado == 'AC' ? 'success' : 'secondary' }}">
                                            {{ $lab->estado == 'AC' ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        {{-- BOTÓN EDITAR (Solo habilitado si está activo, opcional) --}}
                                        <a href="{{ route('admin.laboratoristas.editar', $lab->num_sec) }}" class="mx-2" data-bs-toggle="tooltip" title="Editar">
                                            <i class="fas fa-user-edit text-secondary"></i>
                                        </a>

                                        {{-- BOTÓN CAMBIAR ESTADO DINÁMICO --}}
                                        <a href="javascript:;" wire:click="cambiarEstado({{ $lab->num_sec }})" 
                                        class="mx-2"
                                        data-bs-toggle="tooltip" 
                                        title="{{ $lab->estado == 'AC' ? 'Dar de Baja' : 'Reactivar' }}">
                                            
                                            @if($lab->estado == 'AC')
                                                {{-- Si está activo, mostramos icono de borrar (Rojo) --}}
                                                <i class="fas fa-trash text-danger"></i>
                                            @else
                                                {{-- Si está inactivo, mostramos icono de restaurar (Verde) --}}
                                                <i class="fas fa-check-circle text-success"></i>
                                            @endif
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="4" class="text-center py-4">No hay datos.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>