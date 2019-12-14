@php

	$menuSidebar = [
        "item-1" => [
            [
                "route" => route('sistema.gestion-de-requerimientos.index'),
                "title" => "Historico"
            ]
        ],   
    ];

@endphp



@include('sistema.template.sidebar-foreach', [
    'menuSidebar' => $menuSidebar,
    'menuTop' => 'Desarrollo'
])
