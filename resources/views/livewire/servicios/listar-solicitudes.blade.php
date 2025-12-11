<div class="container-fluid py-4"> <!-- único elemento raíz -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">

                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Solicitudes Realizadas</h6>
                </div>

                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">Nº</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Proyecto</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Empresa</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ensayo</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($solicitudes as $d)
                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $d->num_sec }}</p>
                                    </td>
                                    <td>
                                        <h6 class="mb-0 text-sm">{{ $d->desc_proy }}</h6>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $d->empresa }}</p>
                                    </td>
                                    <td>
                                        <p class="text-xs text-secondary mb-0">{{ $d->ensayo }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs text-secondary mb-0">{{ $d->cantidad }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p class="text-xs text-secondary mb-0">{{ $d->fecha_sol }}</p>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center py-4">No hay solicitudes registradas.</td>
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
