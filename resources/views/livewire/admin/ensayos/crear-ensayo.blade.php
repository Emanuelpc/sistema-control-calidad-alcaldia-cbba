<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header">
            <h6>Crear Nuevo Ensayo</h6>
        </div>
        <div class="card-body">
            <form wire:submit.prevent="guardar">
                <div class="mb-3">
                    <label>Descripción</label>
                    <input type="text" class="form-control" wire:model.defer="descripcion">
                    @error('descripcion') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>Costo</label>
                    <input type="number" class="form-control" wire:model.defer="costo" step="0.01">
                    @error('costo') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>Tipo de Ensayo</label>
                    <select class="form-control" wire:model.defer="tipo_id">
                        <option value="">Seleccionar</option>
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->num_sec }}">{{ $tipo->descripcion }}</option>
                        @endforeach
                    </select>
                    @error('tipo_id') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="mb-3">
                    <label>Estado</label>
                    <select class="form-control" wire:model.defer="estado">
                        <option value="AC">Activo</option>
                        <option value="IN">Inactivo</option>
                    </select>
                    @error('estado') <span class="text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.ensayos.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                    <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
