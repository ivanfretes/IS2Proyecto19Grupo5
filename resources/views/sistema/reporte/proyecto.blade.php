@extends('sistema.template.template')


@section('content_page')


<div class="row ">
    <div class="col-2 offset-8">
        <button type="button" class="btn btn-block btn-primary btn-main" 
            data-toggle="modal" data-target="#UsuarioListModal">
            Filtrar Usuario
        </button>
    </div>
    <div class="col-2">
        <a href="{{ @url()->current() }}" type="button" 
            class="btn btn-block btn-success btn-main" >
            Limpiar
        </a>
    </div>
</div>


@include('sistema.usuario.modal.usuario-list')

<div>

</div>

<div class="table-responsive">
    <table  class="table table-custom">
        <thead>
            <tr >
                <th >Nombre del Proyecto</th>
                <th class="text-center">Fecha Inicio</th>
                <th class="text-center">Fecha Fin</th>
                <th >Usuario Asignado</th>

                <th class="text-right">Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proyectoList as $proyecto)
                @php

                    // Formato de fechha inicio y fecha Fin
                    $fechaInicio  = NULL;
                    $fechaFin = NULL;

                    if($proyecto->fecha_inicio != NULL){
                        $fechaInicio = \Carbon\Carbon::createFromFormat(
                            'Y-m-d', 
                            $proyecto->fecha_inicio
                        )->format('d/m/Y');
                    }


                    if($proyecto->fecha_fin != NULL){
                        $fechaFin = \Carbon\Carbon::createFromFormat(
                            'Y-m-d', 
                            $proyecto->fecha_fin
                        )->format('d/m/Y');
                    }

                    // Nombre de usuario asignado a un proyecto
                    $usuarioNombre = isset($proyecto->usuario) ? 
                        $proyecto->usuario->name : '';

                @endphp

                <tr class="item-detail">
                    <td>
                        <b>{{ $proyecto->nombre }}</b>
                    </td>
                    <td class="text-center">{{ $fechaInicio }}</td>
                    <td class="text-center">{{ $fechaFin }}</td>
                    <td>{{ $usuarioNombre }}</td>
                    <td class="text-right">

                        @if($proyecto->estado == 'abierto')
                            <span class="badge badge-success">
                                {{ $proyecto->estado }}
                            </span>
                        @else
                            <span class="badge badge-danger">
                                {{ $proyecto->estado }}
                            </span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>   

{{ $proyectoList->links() }}

<script type="text/javascript">
    $('#usuario-listado-modal').delegate('li', 'click', function(){
        let usuarioId = $(this).attr('data-usuario');
        window.location.href = `{{ @url()->current() }}?id_usuario=${usuarioId}`;
    })
</script>

@endsection