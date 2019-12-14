@php

	$menuSidebar = [
        "item-1" => [
            [
                "route" => route('sistema.proyectos.index'),
                "title" => "Proyectos"
            ]
        ],   
        "item-2" => [
            [
                "route" => route('sistema.usuarios.index'),
                "title" => "Usuarios"
            ]
        ]   
    ];

@endphp



@include('sistema.template.sidebar-foreach', [
    'menuSidebar' => $menuSidebar,
    'menuTop' => 'Administración'
])
