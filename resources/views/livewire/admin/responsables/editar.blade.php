<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0">
            <h6>Editar Responsable</h6>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- Nombre Completo --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre Completo <span class="text-danger">*</span></label>
                    <input type="text" wire:model="nombre" class="form-control @error('nombre') is-invalid @enderror">
                    @error('nombre') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- CI --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label">C.I. <span class="text-danger">*</span></label>
                    <input type="text" wire:model="ci" class="form-control @error('ci') is-invalid @enderror">
                    @error('ci') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                {{-- Documento --}}
                <div class="col-md-3 mb-3">
                    <label class="form-label">Documento (Título/Cargo)</label>
                    <input type="text" wire:model="documento" class="form-control" placeholder="Ej: Ingeniero Civil">
                </div>
            </div>

            <button wire:click="guardar" class="btn bg-gradient-warning">Actualizar</button>
            <a href="{{ route('admin.responsables.index') }}" class="btn btn-light">Cancelar</a>
        </div>
    </div>
</div>