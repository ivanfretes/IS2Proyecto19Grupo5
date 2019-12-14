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

        "Agenda" => [
            [
                "route" => route("web.admin.agenda-cita.index"),
                "title" => "Listado de citas",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.agenda-cita.create"),
                "title" => "Nueva Cita",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ]
        ],

        "Seguros" => [
            [
                "route" => route("web.admin.contrato-servicio.index"),
                "title" => "Asegurados",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.servicios.index", [
                    'tipo_servicio' => 13
                ]),
                "title" => "Planes",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
        ],

        "Ingresos" => [
            [
                "route" => route("web.admin.pagos-pendientes.index"),
                "title" => "Gestionar Cobro",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.presupuestos.index"),
                "title" => "Presupuetos",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            
            // "Cuotas" => [
            //     "route" => route("web.admin.vencimientos.index"),
            //     "title" => "Cuotas",
            //     "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            // ],
            // [
            //     "route" => route("web.admin.pagos.index"),
            //     "title" => "Cobrar Seguros",
            //     "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            // ],
        ],

        "Reportes" => [
            
            [
                "route" => route("web.admin.ventas.index"),
                "title" => "Cobranzas / Ventas",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.vencimientos.index"),
                "title" => "Vencimientos",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
        ],

        "Compras" => [
            [
                "route" => route("web.admin.compras.index"),
                "title" => "Listado de Compras",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.egreso-tipo.index"),
                "title" => "Articulo / Servicio",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
        ],
        "Proveedores" => [
            [
                "route" => route("web.admin.proveedores.index"),
                "title" => "Proveedores",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.egreso-tipo.index"),
                "title" => "Egresos",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
        ],

        "Recurso Humano" => [
            [
                "route" => "#",
                "title" => "Funcionarios",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => "#",
                "title" => "Salarios",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            // [
            //     "route" => "#",
            //     "title" => "Descuentos",
            //     "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            // ],clear
            // [
            //     "route" => "#",
            //     "title" => "IPS",
            //     "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            // ]
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

        "Mi Negocio" => [
            [
                "route" => route("web.admin.servicios.index"),
                "title" => "Mis Servicios",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            "Nuevo Servicio" => [
                "route" => route("web.admin.servicios.create"),
                "title" => "Nuevo Servicio",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ],
            [
                "route" => route("web.admin.tipo-producto.index"),
                "title" => "Rubros del Negocio",
                "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
            ]
        ],

       /* ,
        
        "vencimientos" => [
            "route" => route("web.admin.vencimientos.index", [
                'fecha_desde' => \Carbon\Carbon::now()->format('d/m/Y'),
                'fecha_hasta' => \Carbon\Carbon::now()->format('d/m/Y'),
            ]),
            "title" => "Vencimientos",
            "icono" => "<i class=\"ni ni-check-bold text-primary\"></i>"
        ],*/

    ];
        
@endphp


@include('admin.template.sidebar-foreach', [
    'menuSidebar' => $menuSidebar
])