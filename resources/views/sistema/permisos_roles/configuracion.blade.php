@php

	$menuSidebar = [
        "item-1" => [
            [
                "route" => route('sistema.fases.index'),
                "title" => "Fase"
            ]
        ],   
        "item-2" => [
            [
                "route" => route('sistema.linea-base.index'),
                "title" => "Linea Base"
            ]
        ],
        "item-3" => [
            [
                "route" => route('sistema.item.index'),
                "title" => "Item"
            ]
        ]      
    ];

@endphp

@include('sistema.template.sidebar-foreach', [
    'menuSidebar' => $menuSidebar, 
    'menuTop' => 'Configuración'
])
