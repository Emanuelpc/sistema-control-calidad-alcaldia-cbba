<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header"><h6>Nuevo Responsable</h6></div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Nombre Completo</label>
                    <input type="text" wire:model="nombre" class="form-control">
                    @error('nombre') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label>C.I.</label>
                    <input type="text" wire:model="ci" class="form-control">
                    @error('ci') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-3 mb-3">
                    <label>Documento (Título/Cargo)</label>
                    <input type="text" wire:model="documento" class="form-control">
                </div>
            </div>
            <button wire:click="guardar" class="btn bg-gradient-success">Guardar</button>
            <a href="{{ route('admin.responsables.index') }}" class="btn btn-light">Cancelar</a>
        </div>
    </div>
</div>