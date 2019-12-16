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

@extends('sistema.template.template')


@section('content_page')

@include('sistema.usuario.modal.usuario-list')

<form action="{{ @route('api.proyectos.update', $proyecto->id) }}" 
		  method="PUT"
		  class="form-ajax-submit forn-with-slug" 
		  id="proyecto-form"
		  autocomplete="off">

	<div class="row row-btn-subhead">
		<div class="offset-6 col-3">
			<button type="button" class="btn btn-block btn-primary" 
				data-toggle="modal" data-target="#UsuarioListModal">
			 	Asignar Usuario
			</button>
	    </div>
	    <div class="col-3">
	        <button class="btn btn-success btn-block btn-main">
	            Guardar Proyecto
	        </button>
	    </div>
	</div>
	
	<div class="col-8 offset-2">
		<div class="form-group">
			<label for="nombre">Nombre</label>
			<input type="text" name="nombre"
				id="nombre"
				class="form-control"
				value="{{ $proyecto->nombre }}"/>
		</div>
		

		<div class="form-group fecha-datepicker">
			<label for="fecha_inicio">Fecha Inicio</label>
			<input type="text" name="fecha_inicio"
				id="fecha_inicio"
				class="form-control"
				value="{{ $fechaInicio }}"/>
		</div>
		
		<div class="form-group fecha-datepicker">
			<label for="fecha_fin">Fecha Fin</label>
			<input type="text" name="fecha_fin"
				id="fecha_fin"
				class="form-control"
				value="{{ $fechaFin }}"/>
		</div>

		<div class="form-group">
			<label for="estado">Estado</label>
			<select name="estado" class="form-control">
				<option value="--">--</option>
				@foreach($estadosAoC as $estado)
					@if($estado == $proyecto->estado)
						<option value="{{ $estado }}"
							selected=yes>
							{{  ucwords($estado) }}
						</option>
					@else
						<option value="{{ $estado }}">
							{{  ucwords($estado) }}
						</option>
					@endif
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="estado">Estado</label>
			<select name="estado" class="form-control">
				<option value="--">--</option>
				@foreach($estadosAoC as $estado)
					@if($estado == $proyecto->estado)
						<option value="{{ $estado }}"
							selected=yes>
							{{  ucwords($estado) }}
						</option>
					@else
						<option value="{{ $estado }}">
							{{  ucwords($estado) }}
						</option>
					@endif
				@endforeach
			</select>
		</div>
	</div>			
</form>



<script type="text/javascript">
	
	// Actualiza el usuario a Proyecto
    $('#usuario-listado-modal').delegate('li', 'click', function(){
        let usuarioId = $(this).attr('data-usuario');
        let proyectoId = {{ $proyecto->id }}

        $.ajax({
            type: 'POST',
            url: `${API}/proyectos/${proyectoId}/asignar-a-usuario`,
            data : JSON.stringify({
                id_usuario : usuarioId
            }),
            headers : {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            success: function(response){
				if(response.message != null){
                    $.notify(response.message, "success");
					
				} else {
                    $.notify("Guardado correctamente", "success");
                }

                $('#UsuarioListModal').modal('hide');



                //let list = response.data;
                // list.forEach(function(element){
                //     $('#usuario-listado-modal').append(`
                //         <li class="list-group-item d-flex justify-content-between align-items-center"
                //             data-usuario="${element.id}">
                //             ${element.name}
                //             <span class="badge badge-primary badge-pill">
                //                 ${element.ci}
                //             </span>
                //         </li>      
                //     `)
                // });                
            },
            error : function(response, textStatus, errorThrown){
                let _errors = response.responseJSON.errors

                for(let _index in _errors){
                    console.log(_index)
                    $.notify(_errors[_index], "warn");
                }
            }
        });

    })
</script>



@endsection