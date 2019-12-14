@extends('admin.template.template')
@section('content_page')

	
<div class="row row-btn-subhead">

    <div class="offset-9 col-3">
        <a href="{{ @route("web.admin.agenda-cita.create") }}"
            class="btn btn-success btn-block">
            Agendar
        </a>
    </div>
</div>

<div class="table-responsive">
    <table  class="table table-bordred table-custom">
        <thead>
            <tr >
                <th >Nombre y Apellido</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Hora</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($agendaList as $cita)
                @php
                    $fecha = NULL;
                    $hora = NULL;
                    if($cita->fecha != NULL){
                        $fecha = \Carbon\Carbon::createFromFormat(
                            'Y-m-d', 
                            $cita->fecha
                        )->format('d/m/Y');

                    }

                    if($cita->hora != NULL){
                        $hora = $cita->hora;
                    }
                @endphp

        		<tr class="item-detail">
        			<td>
                        {{ $cita->cliente->nombre." ".$cita->cliente->apellido
                        }}
                    </td>
                    <td class="text-center">{{ $fecha }}</td>
                    <td class="text-center">{{ $hora }}</td>
        			<td class="text-right">
        				<a href="{{ 
                            @route(
                                'web.admin.agenda-cita.edit',
                                 $cita->id ) 
                            }}" class="btn btn-primary btn-icon ">
                            Editar
                        </a>
                        <a href="{{ 
                            @route(
                                'api.agenda-cita.destroy',
                                 $cita->id ) 
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