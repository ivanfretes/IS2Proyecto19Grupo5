
@extends('sistema.template.template')


@section('content_page')

	<form action="{{ @route('api.item.update', $item->id) }}" 
			  method="PUT"
			  class="form-ajax-submit forn-with-slug" 
			  id="proyecto-form"
			  autocomplete="off">

		<input type="hidden" name="id_aprobacion"
					id="id_aprobacion"
					value="{{ Auth::id() }}"/>
	
		<div class="row row-btn-subhead">
		    <div class="offset-9 col-3">
		        <button class="btn btn-success btn-block btn-main">
		            Guardar Item
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


	<div class="row">
		<div class="col-12"><hr></div>
		<div class="col-12">
			<h3>Modificaciones Solicitadas</h3>
			@if(isset($requerimientoList))
				<table class="table">
					<td>
						 Nombre
					</td>
					<td>
						 Descripción
					</td>

					<td>
						 Version
					</td>

					<td>
						 Acciones
					</td>
					@foreach($requerimientoList as $requerimiento)
						<tr>
							<td>
								 {{ $requerimiento->nombre}}
							</td>
							<td>
								 {!! $requerimiento->descripcion !!}
							</td>

							<td>
								 {!! $requerimiento->version !!}
							</td>

							<td>
								 <button data-id="{{ $requerimiento->id }}"
								 		class="btn btn-success">
									Actualizar
								 </button>
							</td>
						</tr>
					@endforeach
				</table>
			@else
				No se encontraron requerimientos
			@endif
		</div>
	</div>
	

	<script type="text/javascript">
		$('button').click(function(){
			let requerimientoId = $(this).attr('data-id');

			if(typeof requerimientoId != 'undefined'){
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

		                let data = response.data;
		                let usuario = data['usuario'];
		                
		                $('#usuario-asignado').html(`
							Nombre: ${ usuario.name } <br>
							CI: ${ usuario.ci } <br>
							Correo : ${ usuario.email } <br>
		                `)

		                $('#UsuarioListModal').modal('hide');
		            },
		            error : function(response, textStatus, errorThrown){
		                let _errors = response.responseJSON.errors

		                for(let _index in _errors){
		                    console.log(_index)
		                    $.notify(_errors[_index], "warn");
		                }
		            }
		        });
			}
			
		})
	</script>

@endsection