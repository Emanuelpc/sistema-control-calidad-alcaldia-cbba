@extends('layouts.user_type.auth')

@section('content')

  <div class="row">
    <div class="col-12 text-center mb-4">
        <h3 class="font-weight-bolder">Panel de Control</h3>
        <p class="text-secondary text-sm">Bienvenido al sistema de Control de Calidad</p>
    </div>
  </div>

  {{-- ==========================================
       FILA SUPERIOR (4 Botones)
       ========================================== --}}
  <div class="row mb-4">
    
    {{-- 1. NUEVA SOLICITUD --}}
    <div class="col-md-3 mb-4">
      <div class="card h-100 card-plain border">
        <div class="card-body text-center p-3">
            <a href="{{ route('servicios.crear') }}" class="text-decoration-none text-body">
                <div class="icon icon-shape icon-lg bg-gradient-primary shadow mx-auto mb-3">
                    <i class="fas fa-clipboard-list text-lg opacity-10"></i>
                </div>
                <h5 class="font-weight-bolder">Nueva Solicitud</h5>
                <p class="text-xs text-secondary mb-0">Registrar servicio</p>
            </a>
        </div>
      </div>
    </div>

    {{-- 2. PROYECTOS --}}
    <div class="col-md-3 mb-4">
      <div class="card h-100 card-plain border">
        <div class="card-body text-center p-3">
            <a href="{{ route('admin.proyectos.index') }}" class="text-decoration-none text-body">
                <div class="icon icon-shape icon-lg bg-gradient-info shadow mx-auto mb-3">
                    <i class="fas fa-city text-lg opacity-10"></i>
                </div>
                <h5 class="font-weight-bolder">Proyectos</h5>
                <p class="text-xs text-secondary mb-0">Gestión de obras</p>
            </a>
        </div>
      </div>
    </div>

    {{-- 3. ENSAYOS --}}
    <div class="col-md-3 mb-4">
      <div class="card h-100 card-plain border">
        <div class="card-body text-center p-3">
            <a href="{{ route('admin.ensayos.index') }}" class="text-decoration-none text-body">
                <div class="icon icon-shape icon-lg bg-gradient-success shadow mx-auto mb-3">
                    <i class="fas fa-vial text-lg opacity-10"></i>
                </div>
                <h5 class="font-weight-bolder">Ensayos</h5>
                <p class="text-xs text-secondary mb-0">Catálogo de pruebas</p>
            </a>
        </div>
      </div>
    </div>

    {{-- 4. TIPOS DE ENSAYO (Nuevo) --}}
    <div class="col-md-3 mb-4">
      <div class="card h-100 card-plain border">
        <div class="card-body text-center p-3">
            <a href="{{ route('admin.tipos-ensayo.index') }}" class="text-decoration-none text-body">
                <div class="icon icon-shape icon-lg bg-gradient-secondary shadow mx-auto mb-3">
                    <i class="fas fa-tags text-lg opacity-10"></i>
                </div>
                <h5 class="font-weight-bolder">Tipos de Ensayo</h5>
                <p class="text-xs text-secondary mb-0">Clasificación de pruebas</p>
            </a>
        </div>
      </div>
    </div>

  </div>

  {{-- ==========================================
       FILA INFERIOR (3 Botones)
       ========================================== --}}
  <div class="row justify-content-center">

    {{-- 5. PERSONAL --}}
    <div class="col-md-4 mb-4">
      <div class="card h-100 card-plain border">
        <div class="card-body text-center p-3">
            <a href="{{ route('admin.laboratoristas.index') }}" class="text-decoration-none text-body">
                <div class="icon icon-shape icon-lg bg-gradient-warning shadow mx-auto mb-3">
                    <i class="fas fa-users text-lg opacity-10"></i>
                </div>
                <h5 class="font-weight-bolder">Personal</h5>
                <p class="text-xs text-secondary mb-0">Laboratoristas</p>
            </a>
        </div>
      </div>
    </div>

    {{-- 6. RESPONSABLES --}}
    <div class="col-md-4 mb-4">
      <div class="card h-100 card-plain border">
        <div class="card-body text-center p-3">
            <a href="{{ route('admin.responsables.index') }}" class="text-decoration-none text-body">
                <div class="icon icon-shape icon-lg bg-gradient-danger shadow mx-auto mb-3">
                    <i class="fas fa-user-tie text-lg opacity-10"></i>
                </div>
                <h5 class="font-weight-bolder">Responsables</h5>
                <p class="text-xs text-secondary mb-0">Ingenieros y Jefes</p>
            </a>
        </div>
      </div>
    </div>

    {{-- 7. LISTA DE SOLICITUDES (Nuevo) --}}
    <div class="col-md-4 mb-4">
      <div class="card h-100 card-plain border">
        <div class="card-body text-center p-3">
            <a href="{{ route('servicios.listar') }}" class="text-decoration-none text-body">
                <div class="icon icon-shape icon-lg bg-gradient-primary shadow mx-auto mb-3">
                    <i class="fas fa-file-alt text-lg opacity-10"></i>
                </div>
                <h5 class="font-weight-bolder">Solicitudes</h5>
                <p class="text-xs text-secondary mb-0">Ver solicitudes creadas</p>
            </a>
        </div>
      </div>
    </div>

  </div>

@endsection
