@php

	$menuSidebar = [
        "item-1" => [
            [
                "route" => route('sistema.reportes.proyectos'),
                "title" => "Proyectos"
            ]
        ],   
        "item-2" => [
            [
                "route" => route('sistema.reportes.items'),
                "title" => "Item"
            ]
        ]   
    ];

@endphp



@include('sistema.template.sidebar-foreach', [
    'menuSidebar' => $menuSidebar,
    'menuTop' => 'Reportes'
])
