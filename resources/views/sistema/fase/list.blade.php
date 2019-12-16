@extends('sistema.template.template')
@section('content_page')


<div class="row row-btn-subhead">

    <div class="offset-9 col-3">
        <a href="{{ @route("sistema.fases.create") }}"
            class="btn btn-success btn-block btn-main">
            Nueva Fase
        </a>
    </div>
</div>


<div class="table-responsive">
    <table  class="table table-bordred table-custom">
        <thead>
            <tr >
                <th >Nombre de la Fase</th>
                <th >Descripción</th>
                <th >Proyecto</th>
                <th >Estado</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faseList as $fase)
              
                <tr class="item-detail">
                    <td>
                        {{ $fase->nombre }}
                    </td>
                    <td>
                        {!! $fase->descripcion !!}
                    </td>

                    <td>
                        @if(isset($fase->proyecto->nombre))
                            {{ $fase->proyecto->nombre }}
                        @endif
                    </td>

                    <td class="text-right">{{ $fase->estado }}</td>
                  
                    <td class="text-right">
                        <a href="{{ 
                            @route(
                                'sistema.fases.edit',
                                 $fase->id ) 
                            }}" class="btn Nuevo btn-primary btn-icon ">
                            Editar
                        </a>
                        <a href="{{ 
                            @route(
                                'api.fases.destroy',
                                 $fase->id ) 
                            }}" class="btn btn-danger a-remove btn-icon ">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $faseList->links() }}
</div>   
    
@endsection