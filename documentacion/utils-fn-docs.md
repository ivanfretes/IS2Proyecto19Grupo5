
/**
	Envia un formulario, mediante AJAX

	settings : Object(
		id -> Id del formulario "formulario-cliente"
		method -> GET|POST|PUT|DELETE
		action -> link a donde se enviara async
		msg -> mensaje de envio
	)
**
sendForm(settings = {})



/**
	Serializa y convierte los campos de un formulario, 
	con sus datos un JSON
	
	formId : Id del formulario "formulario-cliente"
**/
formDataToJSON(formId)


/**
	Genera un listado de imagenes con paginacion
	
	url -> link de donde consumir las imagenes
	data -> No se encuentra muy definido
**/
set_listado_with_pagination(url, data)


/**
	Elimina una imagen
	imagen_id : Id de la imagen a ser eliminada
	self : Hace referencia a la imagen a ser eliminada, se utiliza para 
		   que el javascript elimine esa imagen y no otras con identificadores 
		   similates
**/
image_remove(image_id, self)


/**
	Crea el slug de la url/slug, remplaza los espacios por guinos
    Si no se inicializa elementToSet, el element se modifica a si mismo
	
	element -> selector del input a utilizarse como referencia
	elementToSet -> el input a actualizarse con el selector "element"
	event
**/
create_slug(element, elementToSet = null, event = 'keyup')


/**
	Envia una imagen al servidor y setea la imagen previa
	
	settings : Object(
		id -> Id del formulario "formulario-cliente"
		method -> GET|POST|PUT|DELETE
		action -> link a donde se enviara async
		msg -> mensaje de envio
	)
**/
send_imagen(settings = {})


/*
	Elimina cualquier item, agregando al
	elemento <a> el `class="a-remove"`, mas en el href
	el link de eliminacion, ya cuenta con el metodo delete por defecto,
	Se debe agregar la clase css ".item-detail" al elemento a ser eliminado 
*/
itemRemove()