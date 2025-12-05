<div class="container-fluid py-4">
    <div class="row">
        {{-- COLUMNA IZQUIERDA: FORMULARIO --}}
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Registrar Nuevo Ensayo</h6>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success text-white text-xs mb-3">{{ session('message') }}</div>
                    @endif

                    <div class="form-group mb-3">
                        <label class="form-label">Tipo de Ensayo</label>
                        {{-- Cargamos los tipos directamente desde el modelo para el select --}}
                        <select wire:model="tipo_id" class="form-control">
                            <option value="">Seleccione Categoría...</option>
                            @foreach(\App\Models\TipoEnsayo::all() as $tipo)
                                <option value="{{ $tipo->num_sec }}">{{ $tipo->descripcion }}</option>
                            @endforeach
                        </select>
                        @error('tipo_id') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Descripción del Ensayo</label>
                        <input type="text" wire:model="descripcion" class="form-control" placeholder="Ej: Granulometría">
                        @error('descripcion') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Costo (Bs)</label>
                        <input type="number" step="0.01" wire:model="costo" class="form-control" placeholder="0.00">
                        @error('costo') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                    </div>

                    <button wire:click="guardar" class="btn bg-gradient-primary w-100 mt-2 mb-0">
                        <i class="fas fa-plus me-2"></i> Agregar Ensayo
                    </button>
                </div>
            </div>
        </div>

        {{-- COLUMNA DERECHA: LISTADO --}}
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <h6>Catálogo de Ensayos</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Descripción</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Costo (Bs)</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($ensayos as $ensayo)
                                <tr>
                                    <td class="ps-4">
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-0 text-sm">{{ $ensayo->descripcion }}</h6>
                                            <span class="text-xs text-secondary">ID: {{ $ensayo->num_sec }}</span>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs font-weight-bold mb-0">{{ number_format($ensayo->costo, 2) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <button wire:click="eliminar({{ $ensayo->num_sec }})" 
                                                class="btn btn-link text-danger text-gradient px-3 mb-0"
                                                onclick="confirm('¿Desactivar este ensayo?') || event.stopImmediatePropagation()">
                                            <i class="far fa-trash-alt me-2"></i>Baja
                                        </button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center text-xs py-4 text-secondary">
                                        No hay ensayos registrados.
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