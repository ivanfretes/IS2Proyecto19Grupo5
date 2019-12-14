@php
    $menuSidebar = [
        "Inicio" => [
            [
                "route" => route("web.admin.index"),
                "title" => "Página Principal",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
        ],   
        "Odontólogia" => [
            [
                "route" => route("web.admin.pacientes.index"),
                "title" => "Pacientes",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],

        ],

        "Estetica Facial" => [
            [
                "route" => route("web.admin.clientes.index"),
                "title" => "Pacientes",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
        ],  

        "Proced. Realizados" => [
            [
                "route" => route("web.admin.procedimientos.index"),
                "title" => "Procedimientos",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.procedimientos.create"),
                "title" => "Nuevo Procedimiento",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ]
        ],

        

        

        "Extra" => [
            [
                "route" => route("web.admin.medicamentos.index"),
                "title" => "Medicamentos",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.medicamentos.create"),
                "title" => "Nuevo Medicamento",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ]
        ],

        // "Funcionarios" => [
        //     [
        //         "route" => route("web.admin.funcionarios.index"),
        //         "title" => "Listado de Funcionarios",
        //         "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
        //     ],
        //     [
        //         "route" => route("web.admin.funcionarios.create"),
        //         "title" => "Nuevo Funcionarios",
        //         "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
        //     ]
        // ],

    ];


@endphp

@include('admin.template.sidebar-foreach', [
    'menuSidebar' => $menuSidebar
])