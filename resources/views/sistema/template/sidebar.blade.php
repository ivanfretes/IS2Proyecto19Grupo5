

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
