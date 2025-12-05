<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0"><h6>Editar Laboratorista</h6></div>
        <div class="card-body">
            <div class="row">
                
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" wire:model="nombre" class="form-control @error('nombre') is-invalid @enderror">
                    @error('nombre') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Usuario</label>
                    <input type="text" wire:model="usr" class="form-control @error('usr') is-invalid @enderror">
                    @error('usr') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="text" wire:model="pwd" class="form-control @error('pwd') is-invalid @enderror" placeholder="(Dejar vacío para mantener la actual)">
                    <small class="text-muted text-xs">Solo escribe si quieres cambiarla.</small>
                    @error('pwd') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Tipo</label>
                    <select wire:model="tipo" class="form-control @error('tipo') is-invalid @enderror">
                        <option value="1">Solicitud</option>
                        <option value="2">Informe</option>
                        <option value="3">Administrador</option>
                    </select>
                    @error('tipo') <span class="text-danger text-xs">{{ $message }}</span> @enderror
                </div>

            </div>
            
            <hr class="horizontal dark">

            <button wire:click="guardar" class="btn bg-gradient-info">Actualizar</button>
            <a href="{{ route('admin.laboratoristas.index') }}" class="btn btn-light">Cancelar</a>
        </div>
    </div>
</div>