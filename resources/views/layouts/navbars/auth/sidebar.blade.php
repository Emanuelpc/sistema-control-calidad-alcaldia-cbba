<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  
  {{-- CABECERA DEL SIDEBAR --}}
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
        <span class="ms-3 font-weight-bold">Control de Calidad</span>
    </a>
  </div>

  <hr class="horizontal dark mt-0">

  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
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

      {{-- 3. ADMINISTRACIÓN --}}
      <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administración</h6>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.proyectos') ? 'active' : '' }}" href="{{ route('admin.proyectos') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-city text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Proyectos</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.ensayos') ? 'active' : '' }}" href="{{ route('admin.ensayos') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-vial text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Ensayos</span>
          </a>
      </li>

      <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('admin.laboratoristas') ? 'active' : '' }}" href="{{ route('admin.laboratoristas') }}">
              <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="fas fa-users text-dark text-lg"></i>
              </div>
              <span class="nav-link-text ms-1">Personal</span>
          </a>
      </li>

      {{-- ELEMENTOS ORIGINALES COMENTADOS (Para referencia futura) --}}
      {{--
      <li class="nav-item mt-3">
        <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laravel Examples</h6>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-profile') ? 'active' : '') }} " href="{{ url('user-profile') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-user text-dark text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">User Profile</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('user-management') ? 'active' : '') }}" href="{{ url('user-management') }}">
            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="fas fa-list-ul text-dark text-lg"></i>
            </div>
            <span class="nav-link-text ms-1">User Management</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('tables') ? 'active' : '') }}" href="{{ url('tables') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-table text-dark text-lg"></i>
          </div>
          <span class="nav-link-text ms-1">Tables</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('billing') ? 'active' : '') }}" href="{{ url('billing') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i class="fas fa-credit-card text-dark text-lg"></i>
          </div>
          <span class="nav-link-text ms-1">Billing</span>
        </a>
      </li>
      --}}
      
    </ul>
  </div>
</aside>