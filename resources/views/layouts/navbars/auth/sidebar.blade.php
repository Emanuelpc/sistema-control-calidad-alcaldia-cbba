<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 fixed-start bg-white" id="sidenav-main">
  
  {{-- CABECERA DEL SIDEBAR MODIFICADA --}}
  {{-- Aumentamos la altura del contenedor para que quepa el logo grande --}}
  <div class="sidenav-header" style="height: 5rem;"> 
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
        {{-- Logo con altura personalizada (60px) y sin restricciones de clase --}}
        <img src="{{ asset('assets/img/logoalcaldia.png') }}" style="max-height: 60px; width: auto;" alt="main_logo">
        <span class="ms-3 font-weight-bold">Control de Calidad <br>G.A.M.C</span>
    </a>
  </div>

  <hr class="horizontal dark mt-0">

  {{-- CUERPO DEL SIDEBAR --}}
  {{-- Ajustamos la resta a -150px para compensar la cabecera más grande --}}
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main" style="height: calc(100vh - 150px);">
    <ul class="navbar-nav">
      
      {{-- 1. INICIO --}}
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('dashboard') ? 'active' : '') }}" href="{{ url('dashboard') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-home text-dark text-lg"></i>
          </div>
          <span class="nav-link-text ms-1">Inicio</span>
        </a>
      </li>

      {{-- 2. OPERACIONES --}}
      <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Operaciones</h6>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('servicios.crear') ? 'active' : '' }}" href="{{ route('servicios.crear') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-clipboard-list text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Nueva Solicitud</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('servicios.listar') ? 'active' : '' }}" 
             href="{{ route('servicios.listar') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-file-alt text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Solicitudes</span>
          </a>
      </li>

      {{-- 3. ADMINISTRACIÓN --}}
      <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administración</h6>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.proyectos*') ? 'active' : '' }}" 
             href="{{ route('admin.proyectos.index') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-city text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Proyectos</span>
          </a>
      </li>

      <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('admin.ensayos.*') ? 'active' : '' }}" 
            href="{{ route('admin.ensayos.index') }}">
                <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-vial text-dark text-lg"></i>
                </div>
                <span class="nav-link-text ms-1">Ensayos</span>
            </a>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.tipos-ensayo*') ? 'active' : '' }}" 
             href="{{ route('admin.tipos-ensayo.index') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-tags text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Tipos de Ensayo</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.laboratoristas*') ? 'active' : '' }}" 
            href="{{ route('admin.laboratoristas.index') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-users text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Personal</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.responsables*') ? 'active' : '' }}" 
             href="{{ route('admin.responsables.index') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-user-tie text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Responsables</span>
          </a>
      </li>
      
    </ul>
  </div>
</aside>