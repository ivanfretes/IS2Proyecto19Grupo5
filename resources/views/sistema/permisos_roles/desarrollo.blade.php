@php

	$menuSidebar = [
        "item-1" => [
            [
                "route" => route('sistema.gestion-de-requerimientos.index'),
                "title" => "Gestión de Requerimientos"
            ]
        ],   
    ];

@endphp



@include('sistema.template.sidebar-foreach', [
    'menuSidebar' => $menuSidebar,
    'menuTop' => 'Desarrollo'
])
