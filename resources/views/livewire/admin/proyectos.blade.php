<div class="container-fluid py-4">
    <div class="row">
        {{-- COLUMNA IZQUIERDA: FORMULARIO --}}
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Nuevo Proyecto</h6>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success text-white text-xs mb-3">{{ session('message') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="form-label">Nombre del Proyecto</label>
                        <textarea wire:model="descripcion" class="form-control" rows="4" placeholder="Ej: Construcción Puente Norte..."></textarea>
                        @error('descripcion') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                    </div>

                    <button wire:click="guardar" class="btn bg-gradient-dark w-100 mt-3 mb-0">
                        <i class="fas fa-save me-2"></i> Guardar Proyecto
                    </button>
                </div>
            </div>
        </div>

        {{-- COLUMNA DERECHA: LISTADO --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Lista de Proyectos Activos</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripción</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($proyectos as $p)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $p->num_sec }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs font-weight-bold mb-0">{{ $p->descripcion }}</p>
                                    </td>
                                    <td class="text-center">
                                        <button wire:click="eliminar({{ $p->num_sec }})" 
                                                class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                onclick="confirm('¿Estás seguro de dar de baja este proyecto?') || event.stopImmediatePropagation()">
                                            <i class="far fa-trash-alt me-2"></i>Dar Baja
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-xs py-4 text-secondary">
                                        No hay proyectos registrados.
                                    </td>
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