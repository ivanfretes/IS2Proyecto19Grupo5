
@extends('sistema.template.template')


@section('content_page')

	<form action="{{ @route('api.linea-base.update', $lineaBase->id) }}" 
			  method="PUT"
			  class="form-ajax-submit forn-with-slug" 
			  id="proyecto-form"
			  autocomplete="off">

		<div class="row row-btn-subhead">
		    <div class="offset-9 col-3">
		        <button class="btn btn-success btn-block btn-main">
		            Guardar Linea Base
		        </button>
		    </div>
		</div>
		
		<div class="col-8 offset-2">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre"
					id="nombre"
					class="form-control"
					value="{{ $lineaBase->nombre }}"/>
			</div>

			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<div class="summernote summernote-not-load" 
						data-input-id="input[name='descripcion']">
						{!! $lineaBase->descripcion !!}
					</div>
				<input type="hidden" value="{{ $lineaBase->descripcion }}"
					name="descripcion">
			</div>


			<div class="form-group">
				<label for="id_proyecto">Proyecto</label>
				<select name="id_proyecto" class="form-control">
					<option value="--">Seleccione un proyecto</option>
					@foreach($proyectoList as $proyecto)
						@if(isset($proyectoSeleccionado) && $proyecto->id == $proyectoSeleccionado->id)
							<option value="{{ $proyecto->id }}"
								selected=yes>
								{{  $proyecto->nombre }}
							</option>
						@else
							<option value="{{ $proyecto->id }}">
								{{  $proyecto->nombre }}
							</option>
						@endif
					@endforeach
				</select>
			</div>


			<div class="form-group">
				<label for="id_fase">Fase</label>
				<select name="id_fase" class="form-control">
					<option value="--">Seleccione una Fase</option>

					@if (isset($proyectoSeleccionado))
						@foreach($proyectoSeleccionado->fases as $fase)
							@if($fase->id == $faseSeleccionada->id)
								<option value="{{ $fase->id }}"
									selected=yes>
									{{  $fase->nombre }}
								</option>
							@else
								<option value="{{ $fase->id }}">
									{{  $fase->nombre }}
								</option>
							@endif
						@endforeach
					@endif
				</select>
			</div>

			<div class="form-group">
				<label for="estado">Estado</label>
				<select name="estado" class="form-control">
					<option value="--">--</option>
					@foreach($estadosFase as $estado)
						@if($estado == $lineaBase->estado)
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


@endsection