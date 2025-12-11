<div class="container-fluid py-4"> <!-- único elemento raíz -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

                <!-- Header con título y botón -->
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Tipos de Ensayo</h6>
                    <a href="{{ route('admin.tipos-ensayo.crear') }}" class="btn bg-gradient-primary btn-sm mb-0">
                        <i class="fas fa-plus me-2"></i>Nuevo Tipo
                    </a>
                </div>

                <!-- Tabla -->
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripción</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tipos as $tipo)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tipo->num_sec }}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $tipo->descripcion }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-sm bg-gradient-{{ $tipo->estado == 'AC' ? 'success' : 'secondary' }}">
                                            {{ $tipo->estado == 'AC' ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <!-- Botón Editar -->
                                            <a href="{{ route('admin.tipos-ensayo.editar', $tipo->num_sec) }}" class="mx-1">
                                                <i class="fas fa-edit text-secondary"></i>
                                            </a>

                                            <!-- Switch Activar/Inactivar -->
                                            <div class="form-check form-switch ms-2 mb-0">
                                                <input class="form-check-input" type="checkbox" id="switch-{{ $tipo->num_sec }}"
                                                    wire:click="toggleEstado({{ $tipo->num_sec }})"
                                                    {{ $tipo->estado == 'AC' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="switch-{{ $tipo->num_sec }}"></label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">No hay tipos de ensayo registrados.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
