


<form action="{{ @route('api.agenda-cita.update', $cita->id) }}" 
	  method="PUT"
	  class="form-ajax-submit forn-with-slug" 
	  id="fase-form"
	  autocomplete="off">

	
	<input type="text" name="nombre" class = "form-control"
		value="{{ $fase->nombre }}"/>
	
	<input type="text" name="descripcion" class = "form-control"
		value="{{ $fase->descripcion }}"/>

	<label for="estado">Estado</label>
	<input type="text" name="estado" class = "form-control"
	value="{{ $fase->estado }}"/>
	
	{{-- Boton para guardar el medicamento --}}
	<div class="row">
		<div class="col-12">
			<div class="row">
				<div class="offset-9 col-3">
					<button type="submit" class="btn btn-success btn-block">
						Agendar</button>
				</div>
				<div class="col-12"><hr></div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-8 offset-2">
			<div class="row">
				<div class="col-12">	
					<label>
						Cliente : <a data-toggle="modal" 
							data-target="#clienteListadoModal">
						   <span class="btn-aqui">[ AQUÍ ]</span>
						</a>	
					</label>
				</div>
				
			</div>
			
			{{-- INBFORMACION DEL CLIENTE --}}
			<div class="row" id="cliente-seleccionado-en-modal">
				<div class="col-9"><h3>Nombre: {{ $cita->cliente->nombre." ".$cita->cliente->apellido}}</h3></div>
				<div class="col-3"><h3>Cédula: {{ $cita->cliente->ci }}</h3></div>
			</div>
			

			<div class="row">
				<div class="col-12"><hr></div>
			</div>


			{{-- Informacion acerca de la agenda --}}


			<div class="row">
				<div class="col-4 fecha-datepicker" >
					<label for="fecha">Fecha de Cita</label>
					<input type="text" 
						name="fecha" 
						class="form-control" 
						value="{{ $fecha }}" 
						id="text">		
				</div>

				<div class="col-4 " >
					<label for="fecha">Hora</label>
					<input type="time" 
						name="hora" 
						class="form-control" 
						value="{{ $hora }}" 
						id="text">		
				</div>

			</div>

			<div class="row">
				<div class="col-12">
					<label for="observacion">Observación</label>
					<div class="summernote summernote-not-load" 
						data-input-id="input[name='observacion']">
						{!! $cita->observacion !!}
					</div>
					<input type="hidden" 
						   name="observacion" 
						   value="{{ $cita->observacion }}">

				</div>
			</div>
		</div>
	</div>
</form>



@include('admin.cliente.cliente-listado-modal')
	

@endsection