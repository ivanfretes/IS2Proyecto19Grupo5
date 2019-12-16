@extends('sistema.template.template')
@section('content_page')


<div class="row row-btn-subhead">

    <div class="offset-9 col-3">
        <a href="{{ @route("sistema.linea-base.create") }}"
            class="btn btn-success btn-block btn-main">
            Nueva Linea Base
        </a>
    </div>
</div>


<div class="table-responsive">
    <table  class="table table-bordred table-custom">
        <thead>
            <tr >
                <th >Linea Base</th>
                <th >Descripción</th>
                <th >Fase</th>
                <th >Proyecto</th>
                <th >Estado</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lineaBaseList as $lineaBase)
              
                <tr class="item-detail">
                    <td>
                        {{ $lineaBase->nombre }}
                    </td>
                    <td>
                        {!! $lineaBase->descripcion !!}
                    </td>

                    <td>
                        @if(isset($lineaBase->fase->nombre))
                            {{ $lineaBase->fase->nombre }}
                        @endif
                    </td>

                    <td>
                        @if(isset($lineaBase->fase->proyecto->nombre))
                            {{ $lineaBase->fase->proyecto->nombre }}
                        @endif
                    </td>
                    
                    <td>
                        {!! $lineaBase->estado !!}
                    </td>

                    <td class="text-right">
                        <a href="{{ 
                            @route(
                                'sistema.linea-base.edit',
                                 $lineaBase->id ) 
                            }}" class="btn Nuevo btn-primary btn-icon ">
                            Editar
                        </a>
                        <a href="{{ 
                            @route(
                                'api.linea-base.destroy',
                                 $lineaBase->id ) 
                            }}" class="btn btn-danger a-remove btn-icon ">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $lineaBaseList->links() }}
</div>   
    
@endsection