@extends('sistema.template.template')


@section('content_page')
	
<div class="row ">
    <div class="offset-9 col-3">
        <a href="{{ @route("sistema.proyectos.create") }}"
            class="btn btn-success btn-block btn-main">
            Nuevo Proyecto
        </a>
    </div>
</div>


<div class="table-responsive">
    <table  class="table table-custom">
        <thead>
            <tr >
                <th >Nombre del Proyecto</th>
                <th class="text-center">Fecha Inicio</th>
                <th class="text-center">Fecha Fin</th>

                <th class="text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($proyectoList as $proyecto)
                @php
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

                @endphp

        		<tr class="item-detail">
        			<td>
                        {{ $proyecto->nombre }}
                    </td>
                    <td class="text-center">{{ $fechaInicio }}</td>
                    <td class="text-center">{{ $fechaFin }}</td>
        			<td class="text-right">
        				<a href="{{ 
                            @route(
                                'sistema.proyectos.edit',
                                 $proyecto->id ) 
                            }}" class="btn btn-primary btn-icon ">
                            Editar
                        </a>
                        <a href="{{ 
                            @route(
                                'api.proyectos.destroy',
                                 $proyecto->id ) 
                            }}" class="btn btn-danger a-remove btn-icon ">
                            Eliminar
                        </a>
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>
</div>   
	
@endsection