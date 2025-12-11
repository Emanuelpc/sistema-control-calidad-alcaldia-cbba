<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h6>Lista de Ensayos</h6>
            <a href="{{ route('admin.ensayos.crear') }}" class="btn bg-gradient-primary btn-sm">
                <i class="fas fa-plus me-2"></i>Nuevo Ensayo
            </a>
        </div>
        <div class="card-body">
            <input type="text" class="form-control mb-3" placeholder="Buscar..." wire:model="search">

            <div class="table-responsive">
                <table class="table align-items-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Costo</th>
                            <th>Tipo de Ensayo</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ensayos as $ensayo)
                        <tr>
                            <td>{{ $ensayo->num_sec }}</td>
                            <td>{{ $ensayo->descripcion }}</td>
                            <td>{{ $ensayo->costo }}</td>
                            <td>{{ $ensayo->tipo->descripcion ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-gradient-{{ $ensayo->estado == 'AC' ? 'success' : 'secondary' }}">
                                    {{ $ensayo->estado == 'AC' ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="text-center">
                            <div class="d-flex justify-content-center align-items-center">
                                <!-- Botón Editar -->
                                <a href="{{ route('admin.ensayos.editar', $ensayo->num_sec) }}" class="mx-1">
                                    <i class="fas fa-edit text-secondary"></i>
                                </a>

                                <!-- Switch Activar/Inactivar -->
                                <div class="form-check form-switch ms-2 mb-0">
                                    <input class="form-check-input" type="checkbox" id="switch-{{ $ensayo->num_sec }}"
                                        wire:click="toggleEstado({{ $ensayo->num_sec }})"
                                        {{ $ensayo->estado == 'AC' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="switch-{{ $ensayo->num_sec }}"></label>
                                </div>
                            </div>
                        </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">No hay ensayos registrados.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
