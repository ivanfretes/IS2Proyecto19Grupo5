
__init();

/**
	Envia un formulario, mediante AJAX

	@param formId : Es el Id del formulario - "#contenido"
	@param msg : Mensaje a ser visualizado, en caso de no indicar busca un retorno de data.message en el json generado por el servidor
*/
function sendForm(settings = {}){
	
	let formId = settings.id;
	let formMethod = settings.method;
	let urlAction = settings.action;
	let msg = settings.msg; 
	
	try {
		if (undefined == formId || null == formId)
			throw "Idenficador de formulario no definido"
		
		if (undefined == urlAction || null == urlAction)
			throw "Propiedad 'action' no definida"
		
		if (undefined == formMethod || null == formMethod)
			throw "Propiedad 'method' no definida"
		
        let formData = formDataToJSON(formId);
        

		$.ajax({
			type: formMethod,
			url: urlAction,
			data: formData, // serializes the form's elements.
			headers : {
				"Content-Type": "application/json",
				"Accept": "application/json",
			},
			success: function(data){
                console.log(data);

				if(data.message != null){
                    $.notify(data.message, "success");
					
				} else {
                    $.notify("Guardado correctamente", "success");
                }
			},
			error : function(response, textStatus, errorThrown){
				console.log(response.responseJSON);
				let _errors = response.responseJSON.errors

				for(let _index in _errors){
					console.log(_index)
					$.notify(_errors[_index], "warn");
				}
			}
		});
		
	} catch(e){
		console.error(e)
	}
	
	
}



/**
	Serializa y convierte los datos de un formulario a un JSON
	
	@param String: Representa al id del formulario "#formulario-example"
	@return JSON;
*/
function formDataToJSON(formId) {
	let form = $(formId);
	let obj = {};
	let formData = form.serialize();
	let formArray = formData.split("&");
	
	for	(inputData of formArray){
		
		let dataTmp = inputData.split('=');
		let dataValueTmp = dataTmp[1];// Value;
		if (dataValueTmp != null && dataValueTmp.trim() != ''){
			obj[dataTmp[0]] = dataValueTmp.replace('+',' ');
		}
	}

	return JSON.stringify(obj);
}




/**
    Genera el listado de imagenes con paginacion
**/
function set_listado_with_pagination(url, data){
	$('#data-result').html('');
	$("#total-search-item").html('');
	$("#item-link-pagination").html('');
		
	try{

		if (data == null || data == '')
			throw $('#search-box').attr("placeholder");
		
		$.ajax({
			url: url, 
			success: function(result){

				let resultadosEncontrados = result.data;
				$("#total-search-item").html(`<b>Coincidencia(s) :</b> ${result.total} `)
				
				let currentPagination = '';
				if (result.current_page == 1 && (result.total > result.per_page)){
					currentPagination = `

						<li class="page-item active"><a class="page-link disabled" href="#">${result.current_page}</a></li>
						<li class="page-item"><a class="page-link" href="${result.next_page_url}">${result.current_page + 1}</a></li>
											
					`
				} else if (result.current_page == 1 && (result.total < result.per_page)){
					currentPagination = `

						<li class="page-item active"><a class="page-link disabled" href="#">${result.current_page}</a></li>
											
					`
				} else if (result.current_page == result.last_page){
					currentPagination = `
						
						<li class="page-item"><a class="page-link" href="${result.prev_page_url}">${result.current_page - 1} </a></li>
						<li class="page-item active"><a class="page-link disabled" href="#">${result.current_page}</a></li>
											
					`
				} else {
					currentPagination = `
						
						<li class="page-item"><a class="page-link" href="${result.prev_page_url}">${result.current_page - 1} </a></li>
						<li class="page-item active"><a class="page-link disabled" href="#">${result.current_page}</a></li>
						<li class="page-item"><a class="page-link" href="${result.next_page_url}">${result.current_page + 1}</a></li>
											
					`
				}
					
				
				$("#item-link-pagination").html(`
					<nav aria-label="Page navigation" style="float:right">
					  <ul class="pagination">
						<li class="page-item">
						  <a class="page-link" href="${result.first_page_url}" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
							<span class="sr-only">Anterior</span>
						  </a>
						</li>
						${currentPagination}
						<li class="page-item">
						  <a class="page-link" href="${result.last_page_url}" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
							<span class="sr-only">Siguiente</span>
						  </a>
						</li>
					  </ul>
					</nav>
				`);
				
				$("#items-per-page").html(`	
					Página ${result.current_page} de ${result.last_page}
				`)

				resultadosEncontrados.forEach(imagenTmp => {
					$('#data-result').append(`
						<div class="col-md-3 image-grid-item" data-id="${imagenTmp.id}">
							<div class="card" >
							  <img class="imagen-item-src" src="${imagenTmp.path}" alt="">
							  <div class="card-body text-center">
								<a href="${imagenTmp.path}" class="imagen-modal-item-link btn btn-primary btn-icon" data-id="${imagenTmp.id}">
                                    <span class="oi oi-check"></span>
                                </a>
                                <a href="${imagenTmp.path}" class="imagen-remove imagen-modal-item-remove btn btn-danger btn-icon" data-id="${imagenTmp.id}">
                                    <span class="oi oi-x"></span>
                                </a>
							  </div>
							</div>
						</div>
					`)
				});
				
				
			}				
		});	
	} catch(e) {
		alert(e);
	}
}

/**
	Elimina una imagen
**/	
function image_remove(image_id, self){
    
    let ws = `${API}/imagen/${image_id}`;
    
	if (confirm("Desea elimina la imagen")){

		$.ajax({
			type: "DELETE",
			url: ws,
			headers : {
				"Content-Type": "application/json",
				"Accept": "application/json",
			},
			success: function(result){

				if(result.message != null){
					$.notify(result.message, "success");
					self.closest('.image-grid-item').remove();

				} else {
					$.notify("Guardado correctamente", "success");
				}    



			},
			error : function(response, textStatus, errorThrown){
				console.log(response);
			}
		});
	}

    

}


/*
	Crea el slug de la url/slug, remplaza los espacios por guinos
    Si no se inicializa elementToSet, el element se modifica a si mismo
	
	@param {string} element : Elemento desde donde modificar URL
	@param {string} elementToSet : Elemento a actualizar
	@param {string} event 
*/	
function create_slug(element, elementToSet = null, event = 'keyup'){
    if (null === elementToSet)
        elementToSet = element;
    $('body').delegate(element, event, function(){

		let a = $(this).val();
		let b= a.replace(/\s/g,"-").toLowerCase();
		b= b.replace(/\//g,"-").toLowerCase();
		$(elementToSet).val(b);

    });        
}


// Envia una imagen, 
function send_imagen(settings = {}){
    
    let formId = settings.getElementById;
    let imagenToSet = settings.imagenToSet;
	let formMethod = "POST";
	let urlAction = settings.action;
	
    try {
        let fileSelect = document.getElementById(formId);
        
        if (undefined == formId || null == formId)
            throw "Idenficador de formulario no definido"

        if (undefined == urlAction || null == urlAction)
           throw "Propiedad 'action' no definida"
        
        if (undefined == imagenToSet || null == imagenToSet)
           throw "Elemento a actualizar no definido 'imagenToSet'"
        
        if (undefined == fileSelect || null == fileSelect)
            throw "fileSelect no encontrado, verifique el 'formId' "
        
        let fileSelectArr = fileSelect.files;
        var formData = new FormData();
        let fileSelectData = fileSelectArr[0];
        
        formData.set("imagen", fileSelectData , fileSelectData.name);
        
        $.ajax({
            url: urlAction,
            type: formMethod,
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
        })
        .done(function(result){
            
            if (result.data != null){
                $(imagenToSet).attr('src', result.data.path);
                set_listado_with_pagination(`${API}/imagen`, -1);
            }
            
            $.notify(result.message, result.type_message);
            
            fileSelect.value = null;
            
        });
    } catch(e){
        console.log(e)    
    }
    
}


/**
 * Elimina un elemento, cualquiera, solo basta que el boton para eliminar 
 * sea un <a class="a-remove"></a> y el elemento a ser eliminado tenga la clase
 * ".item-detail"
*/
function itemRemove(){
	$('body').delegate("a.a-remove", "click", function(e) {
		e.preventDefault();
	
		let url = $(this).attr('href');
		
		if (confirm("Esta por eliminar el elemento. ¿Desea hacerlo?")){
			
			$(this).closest('.item-detail').remove();	
			let self = $(this)
			
			$.ajax({
				type: "DELETE",
				url: `${url}`,
				headers : {
					"Content-Type": "application/json",
					"Accept": "application/json",
				},
				success: function(result){

					if(result.message != null){
						$.notify(result.message, "success");
						self.closest('.image-grid-item').remove();

					} else {
						$.notify("Guardado correctamente", "success");
						self.closest('.image-grid-item').remove();
					}    

				},
				error : function(response, textStatus, errorThrown){
					console.log(response);

				}
			});
		}	
	})
	
}





/**
 * Elimina un elemento, cualquiera, solo basta que el boton para eliminar 
 * sea un <a class="a-remove"></a> y el elemento a ser eliminado tenga la clase
 * ".item-detail"
 * 
 * @param _identificadorParent String - Identificador del elemento pariente
 * @param _success funcion 
 * @param _error funcion
*/
function itemRemove2(_identificadorParent , _success, _error){
	
	$(_identificadorParent).delegate("a.a-remove2", "click", function(e) {
		e.preventDefault();
	
		let url = $(this).attr('href');
		
		if (confirm("Esta por eliminar el elemento. ¿Desea hacerlo?")){
			
			$(this).closest('.item-detail').remove();	
			let self = $(this)
			
			$.ajax({
				type: "DELETE",
				url: `${url}`,
				headers : {
					"Content-Type": "application/json",
					"Accept": "application/json",
				},
				success: function(result){

					if(result.message != null){
						$.notify(result.message, "success");
						self.closest('.image-grid-item').remove();

					} else {
						$.notify("Guardado correctamente", "success");
						self.closest('.image-grid-item').remove();
					}    

					_success()
				},
				error : function(response, textStatus, errorThrown){
					console.log(response);

					_error()
				}
			});
		}	
	})
	
}


/**
 * Convierte bytes 
 * @param {*} bytes 
 */
function bytesToSize(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return 'n/a';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    if (i == 0) return bytes + ' ' + sizes[i];
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
};




function __init(){
	itemRemove();
}
