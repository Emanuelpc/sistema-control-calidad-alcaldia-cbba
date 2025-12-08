<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0"><h6>Editar Proyecto</h6></div>
        <div class="card-body">
            <div class="row">
                {{-- Estructura --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Estructura Programática</label>
                    <input type="text" wire:model="estructura" class="form-control" placeholder="Ej: 10-00-000">
                </div>

                {{-- Documento --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Documento</label>
                    <input type="text" wire:model="documento" class="form-control" placeholder="Memorandum...">
                </div>

                {{-- Responsable (Dropdown) --}}
                <div class="col-md-4 mb-3">
                    <label class="form-label">Responsable <span class="text-danger">*</span></label>
                    <select wire:model="responsable_id" class="form-control @error('responsable_id') is-invalid @enderror">
                        <option value="">Seleccione Responsable...</option>
                        @foreach($responsables as $resp)
                            <option value="{{ $resp->num_sec }}">{{ $resp->nombre }}</option>
                        @endforeach
                    </select>
                    @error('responsable_id') <span class="text-danger text-xs d-block mt-1">{{ $message }}</span> @enderror
                </div>

                {{-- Descripción --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Descripción / Denominación <span class="text-danger">*</span></label>
                    <textarea wire:model="descripcion" class="form-control @error('descripcion') is-invalid @enderror" rows="3"></textarea>
                    @error('descripcion') <span class="text-danger text-xs d-block mt-1">{{ $message }}</span> @enderror
                </div>
            </div>

            <button wire:click="guardar" class="btn bg-gradient-success">Guardar</button>
            <a href="{{ route('admin.proyectos.index') }}" class="btn btn-light">Cancelar</a>
        </div>
    </div>
</div>