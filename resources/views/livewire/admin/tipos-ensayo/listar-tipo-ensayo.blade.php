<div class="container-fluid py-4"> <!-- único elemento raíz -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

                <!-- Header con título y botón -->
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Tipos de Ensayo</h6>
                    <a href="{{ route('admin.tipos-ensayo.crear') }}" class="btn bg-gradient-primary btn-sm mb-0">
                        <i class="fas fa-plus me-2"></i>Nuevo Tipo
                    </a>
                </div>

                <!-- Tabla -->
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">#</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descripción</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tipos as $tipo)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $tipo->num_sec }}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $tipo->descripcion }}</h6>
                                    </td>
                                    <td class="text-center">
                                        <span class="badge badge-sm bg-gradient-{{ $tipo->estado == 'AC' ? 'success' : 'secondary' }}">
                                            {{ $tipo->estado == 'AC' ? 'Activo' : 'Inactivo' }}
                                        </span>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="3" class="text-center py-4">No hay tipos de ensayo registrados.</td>
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
