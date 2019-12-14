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


<form action="{{ @route('api.proyectos.update', $proyecto->id) }}" 
		  method="PUT"
		  class="form-ajax-submit forn-with-slug" 
		  id="proyecto-form"
		  autocomplete="off">

	<div class="row row-btn-subhead">
	    <div class="offset-9 col-3">
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
	</div>			
</form>


@endsection