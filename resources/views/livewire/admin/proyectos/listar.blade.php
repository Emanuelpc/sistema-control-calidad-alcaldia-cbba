<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Lista de Proyectos</h6>
                    <a href="{{ route('admin.proyectos.crear') }}" class="btn bg-gradient-primary btn-sm mb-0">
                        <i class="fas fa-plus me-2"></i>Nuevo Proyecto
                    </a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Estructura</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripción</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Doc. Ref</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($proyectos as $p)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $p->estructura }}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ \Illuminate\Support\Str::limit($p->descripcion, 40) }}</h6>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $p->documento }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-sm bg-gradient-{{ $p->estado == 'AC' ? 'success' : 'secondary' }}">
                                            {{ $p->estado == 'AC' ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.proyectos.editar', $p->num_sec) }}" class="mx-2" title="Editar">
                                            <i class="fas fa-edit text-secondary"></i>
                                        </a>
                                        <a href="javascript:;" wire:click="cambiarEstado({{ $p->num_sec }})" 
                                           class="mx-2" 
                                           onclick="confirm('¿Cambiar estado?') || event.stopImmediatePropagation()">
                                            <i class="fas {{ $p->estado == 'AC' ? 'fa-trash text-danger' : 'fa-check text-success' }}"></i>
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr><td colspan="5" class="text-center py-4">No hay proyectos registrados.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>