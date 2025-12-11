<div class="container-fluid py-4"> <!-- único elemento raíz -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

                <div class="card-header pb-0">
                    <h6>Crear Nuevo Tipo de Ensayo</h6>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <form wire:submit.prevent="guardar" class="p-4">

                        <!-- Descripción -->
                        <div class="mb-3">
                            <label class="form-label">Descripción</label>
                            <input type="text" class="form-control" wire:model.defer="descripcion">
                            @error('descripcion') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Estado -->
                        <div class="mb-3">
                            <label class="form-label">Estado</label>
                            <select class="form-control" wire:model.defer="estado">
                                <option value="AC">Activo</option>
                                <option value="IN">Inactivo</option>
                            </select>
                            @error('estado') <span class="text-danger text-sm">{{ $message }}</span> @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.tipos-ensayo.index') }}" class="btn btn-secondary me-2">Cancelar</a>
                            <button type="submit" class="btn bg-gradient-primary">Guardar</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

</div>
