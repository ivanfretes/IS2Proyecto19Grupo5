@extends('sistema.template.template')
@section('content_page')


<div class="row row-btn-subhead">

    <div class="offset-9 col-3">
        <a href="{{ @route("sistema.usuarios.create") }}"
            class="btn btn-success btn-block btn-main">
            Nuevo Usuario
        </a>
    </div>
</div>


<div class="table-responsive">
    <table  class="table table-bordred table-custom">
        <thead>
            <tr >
                <th >Nombre y Apellido</th>
                <th class="text-center">CI</th>
                <th >Email</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
        	@foreach($usuarioList as $usuario)
              
        		<tr class="item-detail">
        			<td>
                        {{ $usuario->name }}
                    </td>
                    <td class="text-right">{{ $usuario->ci }}</td>
                    <td >{{ $usuario->email }}</td>
                    
        			<td class="text-right">
        				<a href="{{ 
                            @route(
                                'sistema.usuarios.edit',
                                 $usuario->id ) 
                            }}" class="btn Nuevo btn-primary btn-icon ">
                            Editar
                        </a>
                        <a href="{{ 
                            @route(
                                'api.usuarios.destroy',
                                 $usuario->id ) 
                            }}" class="btn btn-danger a-remove btn-icon ">
                            Eliminar
                        </a>
        			</td>
        		</tr>
        	@endforeach
        </tbody>
    </table>
    
    {{ $usuarioList->links() }}
</div>   

@endsection