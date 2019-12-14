
var API = `${baseUrl}/api/v1`;

$('document').ready(function(){
	
	$('[data-toggle="popover"]').popover();
	
	
	// Buscador de productos
    $("#search-form-modal").submit(function(e){
        e.preventDefault();
		
		let data = $('#search-box-modal').val();
		set_resultados_busqueda(`${API}/productos?data=${data}`, data);
    });
	
	// Actualiza el listado de resultados mediante el pagination
	$("#search-item-link").delegate("a", "click", function(e){
		e.preventDefault();
		let link = $(this).attr('href'); 
		set_resultados_busqueda(link, -1);
	});
	
	
	// Actualiza los datos del modal, desde el buscador de productos
	$("#search-form-basic, #search-box-basic-footer").submit(function(e){
		e.preventDefault();
		
		let data = $("#search-box-basic, .search-box-basic").val();
		$("#search-box-modal").val(data);
		$('#searchModal').modal();
		
		set_resultados_busqueda(`${API}/productos?data=${data}`, data);
	});
	
	// Agrega un producto al pedido
	/*$(".add-product").click(function(){
		try {
			let cantidad = $(this).attr('data-content');	
			
			//console.log($(`"#${cantidad}"`))
			console.log(cantidad)
			
		} catch(e) {
			alert(e)
		}
		
	});*/
	
	
    
    // Funcion temporal (eliminar)
	// hace que el formulario no envie datos desde el contenido de los pedidos
 	$("#enviar-tmp").submit((e)=> {
		e.preventDefault();
		console.log('Se envio el formulario');
	});
	
})



function set_resultados_busqueda(url, data){
	$('#search-data-result').html('');
	$("#total-search-item").html('');
	$("#search-item-link").html('');
		
	try{

		if (data == null || data == '')
			throw $('#search-box-modal').attr("placeholder");
		
		$.ajax({
			url: url, 
			success: function(result){

				let resultadosEncontrados = result.data;
				let meta = result.meta;
				let links = result.links;
				let sinPagination = false;
				
				$("#total-search-item").html(`<b>Coincidencia(s) :</b> ${meta.total} `)
				


				let currentPagination = '';
				if (meta.current_page == 1 && (meta.total > meta.per_page)){
					currentPagination = `

						<li class="page-item active"><a class="page-link" href="#">${meta.current_page}</a></li>
						<li class="page-item"><a class="page-link" href="${links.next}">${meta.current_page + 1}</a></li>
											
					`
				} else if (meta.current_page == 1 && (meta.total < meta.per_page)){
					sinPagination = true;

				} else if (meta.current_page == meta.last_page){
					currentPagination = `
						
						<li class="page-item"><a class="page-link" href="${links.prev}">${meta.current_page - 1} </a></li>
						<li class="page-item active"><a class="page-link" href="#">${meta.current_page}</a></li>
											
					`
				} else {
					currentPagination = `
						
						<li class="page-item"><a class="page-link" href="${links.prev}">${meta.current_page - 1} </a></li>
						<li class="page-item active"><a class="page-link" href="#">${meta.current_page}</a></li>
						<li class="page-item"><a class="page-link" href="${links.next}">${meta.current_page + 1}</a></li>
											
					`
				}
					
				
				if (!sinPagination){
					$("#search-item-link").html(`
						<nav aria-label="Page navigation" style="float:right">
						  <ul class="pagination">
							<li class="page-item">
							  <a class="page-link" href="${links.first}" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
								<span class="sr-only">Anterior</span>
							  </a>
							</li>
							${currentPagination}
							<li class="page-item">
							  <a class="page-link" href="${links.last}" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
								<span class="sr-only">Siguiente</span>
							  </a>
							</li>
						  </ul>
						</nav>
						<ul>
					`);
				}

				
				$("#search-per-page").html(`	
					Página ${meta.current_page} de ${meta.last_page}
				`)

				resultadosEncontrados.forEach((publicacion, pubIndex)=> {
					$('#search-data-result').append(`
						<div class="col-md-12 search-item">
							<div class="well well-sm">
								<div class="row">
									<div class="col-xs-2 col-md-2 text-center">
										<img src="${baseUrl}/${publicacion.imagen_portada_path}" alt="${publicacion.titulo}"
											class="img-rounded img-responsive" />
									</div>
									<div class="col-xs-10 col-md-10 section-box">
										<h2>
											<a href="${baseUrl}/productos/${publicacion.slug}" target="_blank">${publicacion.titulo}</a>
										</h2>
										<hr />

										<div class="row">
											<!--div class="col-md-3">
												<p class="btn-add">
                            					<i class="fa fa-shopping-cart"></i><a href="#" class="hidden-sm"> Agregar</a></p>
											</div-->
											<div class="col-md-3">
												<p class="btn-details">
                            					<i class="fa fa-list"></i><a href="http://localhost:8000/productos/cod.-213" class="hidden-sm"> Ver más</a></p>
											</div>
										</div>
									</div>
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
				
	