<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0 d-flex justify-content-between">
            <h6>Responsables (Ingenieros/Arquitectos)</h6>
            <a href="{{ route('admin.responsables.crear') }}" class="btn bg-gradient-primary btn-sm">
                <i class="fas fa-plus me-2"></i>Nuevo
            </a>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="ps-4 text-secondary text-xxs font-weight-bolder">Nombre</th>
                            <th class="text-secondary text-xxs font-weight-bolder">CI</th>
                            <th class="text-secondary text-xxs font-weight-bolder">Documento</th>
                            <th class="text-center text-secondary text-xxs font-weight-bolder">Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($lista as $r)
                        <tr>
                            <td class="ps-4"><h6 class="mb-0 text-sm">{{ $r->nombre }}</h6></td>
                            <td><p class="text-xs font-weight-bold mb-0">{{ $r->ci }}</p></td>
                            <td><p class="text-xs text-secondary mb-0">{{ $r->documento }}</p></td>
                            <td class="text-center">
                                <span class="badge badge-sm bg-gradient-{{ $r->estado == 'AC' ? 'success' : 'secondary' }}">
                                    {{ $r->estado == 'AC' ? 'Activo' : 'Inactivo' }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.responsables.editar', $r->num_sec) }}" class="mx-2"><i class="fas fa-edit text-secondary"></i></a>
                                <a href="javascript:;" wire:click="cambiarEstado({{ $r->num_sec }})" onclick="confirm('¿Cambiar estado?') || event.stopImmediatePropagation()"><i class="fas fa-sync text-secondary"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>