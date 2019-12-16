
@extends('sistema.template.template')


@section('content_page')

	<form action="{{ @route('api.gestion-de-requerimientos.update', $item->id) }}" 
			  method="PUT"
			  class="form-ajax-submit forn-with-slug" 
			  id="proyecto-form"
			  autocomplete="off">

		<div class="row row-btn-subhead">
		    <div class="offset-9 col-3">
		        <button class="btn btn-success btn-block btn-main">
		            Guardar Requerimiento
		        </button>
		    </div>
		</div>
		
		<div class="col-8 offset-2">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre"
					id="nombre"
					class="form-control"
					value="{{ $item->nombre }}"/>
			</div>

			<div class="form-group">
				<label for="descripcion">Descripción</label>
				<div class="summernote summernote-not-load" 
						data-input-id="input[name='descripcion']">
						{!! $item->descripcion !!}
					</div>
				<input type="hidden" value="{{ $item->descripcion }}"
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

					@if (isset($faseSeleccionada))
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
				<label for="id_lineabase">Linea Base</label>
				<select name="id_lineabase" class="form-control">
					<option value="--">Seleccione una Linea Base</option>

					@if (isset($lineaBaseSeleccionada))
						@foreach($lineaBaseList as $lBase)
							@if($lBase->id == $lineaBaseSeleccionada->id)
								<option value="{{ $lBase->id }}"
									selected=yes>
									{{  $lBase->nombre }}
								</option>
							@else
								<option value="{{ $lBase->id }}">
									{{  $lBase->nombre }}
								</option>
							@endif
						@endforeach
					@endif
				</select>
			</div>

		</div>			
	</form>


@endsection