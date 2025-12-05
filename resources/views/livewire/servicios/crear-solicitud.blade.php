<div class="container-fluid py-4">
    
    @if (session()->has('message'))
        <div class="alert alert-success text-white mb-3">{{ session('message') }}</div>
    @endif
    @error('general') 
        <div class="alert alert-danger text-white mb-3">{{ $message }}</div> 
    @enderror

    <div class="card">
        <div class="card-header pb-0">
            <h6>Nueva Solicitud de Servicio</h6>
        </div>
        <div class="card-body">
            
            {{-- CABECERA --}}
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Proyecto</label>
                    <select wire:model="num_sec_proy" class="form-control">
                        <option value="">Seleccionar Proyecto...</option>
                        @foreach($proyectos as $p)
                            <option value="{{ $p->num_sec }}">{{ $p->descripcion }}</option>
                        @endforeach
                    </select>
                    @error('num_sec_proy') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Empresa / Cliente</label>
                    <input type="text" wire:model="empresa" class="form-control">
                    @error('empresa') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Ubicación</label>
                    <input type="text" wire:model="ubicacion" class="form-control">
                    @error('ubicacion') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Fecha Solicitud</label>
                    <input type="date" wire:model="fecha_sol" class="form-control">
                    @error('fecha_sol') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Hora</label>
                    <input type="time" wire:model="hra_sol" class="form-control">
                </div>
            </div>

            <hr class="horizontal dark my-3">

            {{-- DETALLES --}}
            <h6>Servicios Solicitados</h6>
            <div class="row align-items-end mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tipo de Ensayo</label>
                    <select wire:model="ensayo_id" class="form-control">
                        <option value="">Seleccionar Ensayo...</option>
                        @foreach($ensayos as $e)
                            <option value="{{ $e->num_sec }}">{{ $e->descripcion }} ({{ $e->costo }} Bs)</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="form-label">Cantidad</label>
                    <input type="number" wire:model="cantidad" class="form-control" min="1">
                </div>
                <div class="col-md-4">
                    <button wire:click="agregarItem" class="btn btn-primary w-100 mb-0">
                        + Agregar a la lista
                    </button>
                </div>
                @error('items') <span class="text-danger text-xs mt-2 d-block">{{ $message }}</span> @enderror
            </div>

            {{-- TABLA --}}
            <div class="table-responsive">
                <table class="table align-items-center mb-0 table-bordered">
                    <thead class="bg-light">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder">Descripción</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Cant.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Costo U.</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Subtotal</th>
                            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $index => $item)
                        <tr>
                            <td class="text-sm px-3">{{ $item['descripcion'] }}</td>
                            <td class="text-center text-sm">{{ $item['cantidad'] }}</td>
                            <td class="text-center text-sm">{{ $item['costo'] }}</td>
                            <td class="text-center text-sm font-weight-bold">{{ $item['cantidad'] * $item['costo'] }}</td>
                            <td class="text-center">
                                <a href="javascript:;" wire:click="eliminarItem({{ $index }})" class="text-danger font-weight-bold text-xs">
                                    Quitar
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-sm py-3 text-secondary">
                                No hay ensayos agregados todavía.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <label class="form-label">Observaciones</label>
                    <textarea wire:model="obs_solicitante" class="form-control" rows="2"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-4">
                <button wire:click="guardar" class="btn bg-gradient-success mb-0">Guardar Solicitud</button>
            </div>

        </div>
    </div>
</div>