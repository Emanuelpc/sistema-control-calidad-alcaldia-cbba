<div class="container-fluid py-4">
    <div class="row">
        {{-- COLUMNA IZQUIERDA: FORMULARIO --}}
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Nuevo Laboratorista</h6>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success text-white text-xs mb-3">{{ session('message') }}</div>
                    @endif

                    <div class="form-group">
                        <label class="form-label">Nombre Completo</label>
                        <input type="text" wire:model="nombre" class="form-control" placeholder="Ej: Juan Pérez">
                        @error('nombre') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                    </div>

                    <button wire:click="guardar" class="btn bg-gradient-info w-100 mt-3 mb-0">
                        <i class="fas fa-user-plus me-2"></i> Registrar Personal
                    </button>
                </div>
            </div>
        </div>

        {{-- COLUMNA DERECHA: LISTADO --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Personal de Laboratorio</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">ID</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($lista as $lab)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $lab->num_sec }}</p>
                                    </td>
                                    <td>
                                        <div class="d-flex px-2 py-1">
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm">{{ $lab->nombre }}</h6>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center align-middle text-sm">
                                        <span class="badge badge-sm bg-gradient-success">Activo</span>
                                    </td>
                                    <td class="text-center">
                                        <button wire:click="eliminar({{ $lab->num_sec }})" 
                                                class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                onclick="confirm('¿Dar de baja a este personal?') || event.stopImmediatePropagation()">
                                            <i class="far fa-trash-alt me-2"></i>Baja
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-xs py-4 text-secondary">
                                        No hay personal registrado.
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