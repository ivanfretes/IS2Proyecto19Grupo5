
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

    <div class="sidebar-brand-text mx-3">
       {{ $appName }}
    </div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Inicio</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    MENÚ    
  </div>



{{-- Si es administrador --}}
@if (@Auth::user()->hasRole('administracion'))
    @include('sistema.permisos_roles.administracion')
@endif

{{-- Si es configuracion --}}
@if (@Auth::user()->hasRole('configuracion'))
    @include('sistema.permisos_roles.configuracion')
@endif

{{-- Si es desarrollador --}}
@if (@Auth::user()->hasRole('desarrollo'))
    @include('sistema.permisos_roles.desarrollo')
@endif


@if (@Auth::user()->hasRole('super-admin'))
    @include('sistema.permisos_roles.administracion')
    @include('sistema.permisos_roles.configuracion')
    @include('sistema.permisos_roles.desarrollo')
@endif



  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
