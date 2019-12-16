var API = `${baseUrl}/api/v1`;

// Imagen seleccionada desde el modal
var imagen_modal_selected = null

$('document').ready(function(){
    

    /**
     * Editor wysiwyg, summernote
     * A medida que se edita el elemento, actualiza un input del tipo hidden
     */
    $(".summernote").summernote({
        placeholder: 'Editar Contenido [ aquí ]',
        lang: 'es-ES',
        callbacks: {
            onInit: function() {
                let id = $(this).attr('data-input-id');
                $(this).removeClass('summernote-not-load');
            },
            onChange: function(content){
                let id = $(this).attr('data-input-id');
                
                try{
                    if (id == null)
                        throw "Por favor inicialize el data-input-id del elemento <div>"
                    
                    $(id).val(content);
                    
                } catch(e) {
                    console.log(e)    
                }

            },
            onBlur: function(c) {},
            onImageUpload: function(files) {}
        }
    });
	
	
    // Oculta el menu lateral
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
	
	
	// Envia un formulario mediante, ajax, 
    // Es un requisito que cuente con la clase "form-ajax-submit"
	$(".form-ajax-submit").submit(function(e){
		e.preventDefault();
		
		sendForm({
			"id" : "#"+$(this).attr('id'),
			"method" : $(this).attr('method'),
			"action" : $(this).attr("action")
		});
        
        imagen_modal_selected = null;
	});
    
    
	
	/** -- Imagenes Listado y Modal -- **/
    // Id de la imagen a ser acutalizado -> data-input-imagen="imagen_portada"
    // Path / Link de la imagen en donde se actualizara lo seleccionado -> data-imagen-set="#imagen-portada-preview"
	$('a.open-imagen-listado-modal').click(function(e){
		e.preventDefault();
        
        let imagen_input_name = $(this).attr(`data-input-imagen`);
        let imagen_src = $(this).attr(`data-imagen-set`)
        
        imagen_modal_selected = {
            imagen_id : $(`input[name=${imagen_input_name}]`),
            imagen_src : $(imagen_src)
        }

		set_listado_with_pagination(`${API}/imagen`, -1)
		
		$('#imagen-modal').modal();
	});
	
	
	// Paginacion de imagenes 
	$("#item-link-pagination").delegate("a", "click", function(e){
		e.preventDefault();
		
		let link = $(this).attr('href'); 
		set_listado_with_pagination(link, -1);
	});
	
	
	// Selecionar una imagen del modal "listado de imagenes"
	$("#data-result").delegate("a.imagen-modal-item-link","click", function(e){
		e.preventDefault();
		let image_link = $(this).attr('href');
		let image_id = $(this).attr('data-id');
		
        
        imagen_modal_selected.imagen_id.val(image_id);
        imagen_modal_selected.imagen_src.attr("src", image_link);
		
		$('#imagen-modal').modal('hide');
	});
    
	
    // Elimina una imagen, del listado
    $("#data-result").delegate("a.imagen-modal-item-remove", "click", function(e){
		e.preventDefault();
		
		let image_id = $(this).attr('data-id');        
        image_remove(image_id, $(this));
    })
    
    
    $("#producto-form #titulo").keyup(function(e){
        let inputElementId = "#producto-form #titulo"; 
        let elementToSet = "#producto-form #slug"; 
        
         create_slug(inputElementId, elementToSet);
    });
    
    
    // Sube una imagen
    $("#upload-imagen-form").submit(function(e){
        e.preventDefault();
        
        send_imagen({
            "getElementById" : "inputGroupFile01",
            "imagenToSet" : "#imagen-get-submit",
            "action" : $(this).attr('action')
        }); 
    });
    
    
});


/**
    Envia formulario de detalle de un pedido
*/
$('document').ready(function(){

    // Enviar formulario de pedido detalle
    $('body').delegate('.pd_detalle', "change", function(e){
        let trParent =  $(this).closest('tr');
        let trId = trParent.attr('id');
        
        sendForm({
            id : `#${formId}`,
            method : formParent.attr('method'),
            action : formParent.attr('action')
        })
    })


    // Enviar formulario de pedido detalle 
    $("input[name=precio_unitario], input[name=cantidad]").keyup(function(e){
        let trParent =  $(this).closest('tr');
        let trId = trParent.attr('id');
        let formParent = $(`#${trId} form`);
        let formId = formParent.attr('id');


        var code = e.which;
        if(code==13) e.preventDefault();
        if(code == 32 || code == 13 || code == 188 || code == 186){
            sendForm({
                id : `#${formId}`,
                method : formParent.attr('method'),
                action : formParent.attr('action')
            })
        } 

        
        let cantidad = $(`#${trId} input[name=cantidad]`).val()
        let precioUnit = $(`#${trId} input[name=precio_unitario]`).val()
        let precioTotal = "-";

        if(isNaN(precioUnit) || isNaN(cantidad)){
            $(this).val('')
        } else {
            precioTotal = precioUnit * cantidad;        
            $(`#${trId} input[name=precio_total]`).val(precioTotal);
            $(`#${trId} p.pd_precio_total_preview`).html(precioTotal);
        }
    });

	
    // Datepicker de cualquier input del tipo fecha, 
	// con el class .fecha-datepicker
    $('.fecha-datepicker input').datepicker({
        format: "dd/mm/yyyy",
        language: "es",
        autoclose: true,
        todayHighlight: true
    });

    
	
	/** Buscador de clientes con ajax **/
    $('#cliente-modal-box').keyup(function(e){
		let data = $(this).val();
		
		$.get(`${API}/clientes/buscar`, { data : data }, function(response){
			let clienteList = response.data;
			$('#cliente-listado-modal').html('');
			
			clienteList.forEach(function(cliente, index){
				$('#cliente-listado-modal').append(`
					<a href="#" class="list-group-item list-group-item-action flex-column align-items-start"
						data-cliente-id="${cliente.id}" data-cliente-json='${JSON.stringify(cliente)}'>
						<div class="d-flex w-100 justify-content-between">
						  <h5 class="mb-1">${cliente.nombre} ${cliente.apellido}</h5>
						  <small>${cliente.tipo_cliente}</small>
						</div>
						
						<p class="mb-1">
							<span class="badge badge-primary badge-pill">CI: ${cliente.ci} / RUC: ${cliente.ruc}</span>
						</p>
					</a>
 				`);
			})
		});
	});


    /** Buscador de proveedores con ajax **/
    $('#proveedor-modal-box').keyup(function(e){
        let data = $(this).val();
        
        $.get(`${API}/proveedores/buscar`, { data }, function(response){
            let proveedorList = response.data;
            $('#proveedor-listado-modal').html('');
            
            proveedorList.forEach(function(proveedor, index){
                $('#proveedor-listado-modal').append(`
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start "
                        data-proveedor-id="${proveedor.id}" data-proveedor-json='${JSON.stringify(proveedor)}'>
                        <div class="d-flex w-100 justify-content-between">
                          <h5 class="mb-1">${proveedor.nombre}</h5>
                        </div>
                        
                        <p class="mb-1">
                            <span class="badge badge-primary badge-pill">
                            RUC: ${proveedor.ruc}</span>
                        </p>
                    </a>
                 `);
            })
        });
    });

	
	// Selecciona un elemento del listado de clientes del modal
	$("#cliente-listado-modal").delegate("a","click",function(e){
		e.preventDefault();
		
		let clienteId = $(this).attr('data-cliente-id');
		let clienteData = $(this).attr('data-cliente-json');
		let cliente = JSON.parse(clienteData);
		
		$('input[name=id_cliente]').val(clienteId);
        $('#id_cliente').val(clienteId);

		if (cliente.tipo_empresa == 'empresa'){
			$('#cliente-seleccionado-en-modal').html(`
				<div class="col-9"><h3>Nombre: ${cliente.nombre}</h3></div>
				<div class="col-3"><h3>Ruc: ${cliente.ruc}</h3></div>
			`);
		} else {
			$('#cliente-seleccionado-en-modal').html(`
				<div class="col-9"><h3>Nombre: ${cliente.nombre} ${cliente.apellido}</h3></div>
				<div class="col-3"><h3>Cédula: ${cliente.ci}</h3></div>
			`);
		}
		
		 $('#clienteListadoModal').modal('toggle');
	});

	
	   
    // Lista todas las fase de un proyecto y los inserta en un 
    // <select name="id_fase">
    $("select[name=id_proyecto]").change(function(){
        let proyectoId = $(this).val();

        $.ajax({
            type: 'GET',
            url: `${API}/fases?id_proyecto=${proyectoId}`,
            headers : {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            success: function(response){
                $('select[name=id_fase]').html(`
                    <option value="--">
                            --
                    </option>
                `);

                let data = response.data;
                let faseList = data['data'];
                faseList.forEach(function(element){
                    $('select[name=id_fase]').append(`
                        <option value="${element.id}">
                            ${element.nombre}
                        </option>
                    `);
                });
            },
            error : function(response, textStatus, errorThrown){
                let _errors = response.responseJSON.errors

                for(let _index in _errors){
                    console.log(_index)
                    $.notify(_errors[_index], "warn");
                }
            }
        });

    });


    // Lista todas las fase de un proyecto y los inserta en un 
    // <select name="id_fase">
    $("select[name=id_fase]").change(function(){
        let faseId = $(this).val();

        $.ajax({
            type: 'GET',
            url: `${API}/linea-base?id_fase=${faseId}`,
            headers : {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            success: function(response){
                $('select[name=id_lineabase]').html(`
                    <option value="--">
                            --
                    </option>
                `);

                let list = response.data;
                list.forEach(function(element){
                    $('select[name=id_lineabase]').append(`
                        <option value="${element.id}">
                            ${element.nombre}
                        </option>
                    `);
                });
            },
            error : function(response, textStatus, errorThrown){
                let _errors = response.responseJSON.errors

                for(let _index in _errors){
                    console.log(_index)
                    $.notify(_errors[_index], "warn");
                }
            }
        });

    });



    // Listado de usurio en el modal
    $('#usuario-box-modal').keyup(function(){
        $('#usuario-listado-modal').html('');

        let q = $(this).val();

        $.ajax({
            type: 'GET',
            url: `${API}/usuarios/buscar`,
            data : {
                q
            },
            headers : {
                "Content-Type": "application/json",
                "Accept": "application/json",
            },
            success: function(response){

                let list = response.data;
                list.forEach(function(element){
                    $('#usuario-listado-modal').append(`
                        <li class="list-group-item d-flex justify-content-between align-items-center"
                            data-usuario="${element.id}">
                            ${element.name}
                            <span class="badge badge-primary badge-pill">
                                ${element.ci}
                            </span>
                        </li>      
                    `)
                });                
            },
            error : function(response, textStatus, errorThrown){
                let _errors = response.responseJSON.errors

                for(let _index in _errors){
                    console.log(_index)
                    $.notify(_errors[_index], "warn");
                }
            }
        });
    });
    
    

})