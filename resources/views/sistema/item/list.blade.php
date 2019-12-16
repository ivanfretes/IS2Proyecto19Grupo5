@extends('sistema.template.template')
@section('content_page')


<div class="row row-btn-subhead">

    <div class="offset-9 col-3">
        <a href="{{ @route("sistema.item.create") }}"
            class="btn btn-success btn-block btn-main">
            Nuevo Item
        </a>
    </div>
</div>


<div class="table-responsive">
    <table  class="table table-bordred table-custom">
        <thead>
            <tr >
                <th >Nombre del Item</th>
                <th >Descripción</th>
                <th >Linea Base</th>
                <th >Fase</th>
                <th >Proyecto</th>
                <th class="text-right">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($itemList as $item)
                @php
                    
                    $lineaBaseNombre  = isset($item->lineabase) ?
                        $item->lineabase->nombre : '';
                    
                    $faseNombre = isset($item->lineabase->fase) ?
                        $item->lineabase->fase->nombre : '';

                    $proyectoNombre = isset($item->lineabase->fase->proyecto) ?
                        $item->lineabase->fase->proyecto->nombre : '';                    
                @endphp


                <tr class="item-detail">
                    <td>
                        {{ $item->nombre }}
                    </td>
                    <td>
                        {!! $item->descripcion !!}
                    </td>
                    
                    <td>
                        {{ $lineaBaseNombre }}
                    </td>

                    <td>
                        {{ $faseNombre }}
                    </td>

                    <td>
                        {{ $proyectoNombre }}
                    </td>
                  
                    <td class="text-right">
                        <a href="{{ 
                            @route(
                                'sistema.item.edit',
                                 $item->id ) 
                            }}" class="btn Nuevo btn-primary btn-icon ">
                            Editar
                        </a>
                        <a href="{{ 
                            @route(
                                'api.item.destroy',
                                 $item->id ) 
                            }}" class="btn btn-danger a-remove btn-icon ">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    {{ $itemList->links() }}
</div>   
    
@endsection