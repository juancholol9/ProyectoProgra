var tabla;
function init(){

listar();
	$.post("../ajax/trabajadores.php?opc=listapr", function(r){
		$("#lugares").html(r);
		$('#lugares').selectpicker('refresh');
});
	$("#formulario").on("submit", function(e){
	guardarRegistro(e);
	} );
}

function activar(idcategoria){

	Swal.fire({
		title: 'Desea activar el registro?',
		text: "Esta seguro de activar el registro",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes, Activar!'
	}).then((result) => {
		if (result.isConfirmed) {

			$.post("../ajax/proveedor.php?opc=activar", {idcategoria : idcategoria}, function(e){
				
				Swal.fire(
					'Activado!',
					e,
					'success'
				)
		            tabla.ajax.reload();
        	});


		}
	})



/*
bootbox.confirm("¿Está Seguro de activar la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/proveedor.php?opc=activar", {idcategoria : idcategoria}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})*/
	



}
function desactivar(idcategoria){

	Swal.fire({
		title: 'Estas seguro de anular?',
		text: "Pasara a los desactivados",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Yes'
	}).then((result) => {
		if (result.isConfirmed) {
			$.post("../ajax/proveedor.php?opc=anular", {idcategoria : idcategoria}, function(e){
        	//	bootbox.alert(e);
				Swal.fire(
					'Fue anulado!',
					e,
					'success'
				)
	            tabla.ajax.reload();
        	});	
		}
	})


	/*bootbox.confirm("¿Está Seguro de anular la Categoría?", function(result){
		if(result)
        {
        	$.post("../ajax/proveedor.php?opc=anular", {idcategoria : idcategoria}, function(e){
        		bootbox.alert(e);
	            tabla.ajax.reload();
        	});	
        }
	})*/
	



}
function mostrar(idcategoria){
	$("#exampleModalCenter").modal('show');
//alert("Mostra " +idcategoria);

$.post("../ajax/trabajadores.php?opc=mostrar",{idcategoria : idcategoria}, function(data, status)
	{
		data = JSON.parse(data);	
	

		/// # es de la vista, data es de la tabla
		$("#idproveedor").val(data.idproveedor);
		$("#proveedor").val(data.proveedor);
		$("#telefono").val(data.costo);
		$("#direccion").val(data.precio);
		
		
		

})
}
function limpiar(){
	$("#idlugar").val("");
		$("#lugar").val("");
		$("#descripcion").val("");
        $("#idcategoria").val("");
        $("#estante").val("");

}
function guardarRegistro(){
		
//	e.preventDefault(); //No se activará la acción predeterminada del evento	


	var formData = new FormData($("#formulario")[0]);
	$.ajax({
		url: "../ajax/trabajadores.php?opc=guardaryeditar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          //alert(datos);	 
			Swal.fire(
				'Agregado!',
				datos,
				'Finalizado'
			)         	          
	        tabla.ajax.reload();
	    }

	});

	limpiar();
	listar();
	$("#exampleModalCenter").modal('hide');
	
}
function listar(){

	tabla=$('#tbllistado').dataTable(
    {
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		    'copyHtml5','excelHtml5','csvHtml5','pdf'
		        ],
		"ajax":
				{
					url: '../ajax/trabajadores.php?opc=listar',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
        "paging": true,
		
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();
	

}

function agregar_item(){

        document.getElementById("content").innerHTML+=
        '<div class="card-group" id="card-group">'+
        '<div class="card">'+
        '<div class="w-50 p-3"><!-- Imagen -->'+
        '<img class="card-img-top" src="img_productos/vino_anejo.jpg" alt="Card image cap">'+
        '</div>'+
        '<div class="card-body"><!-- Cuerpo -->'+
        '<h5 class="card-title">VINO 3</h5>'+
        '<p class="card-text">Aqui va la info del producto.</p>'+
        '<button type="button" class="btn btn-primary">'+
        '<i class="fas fa-cart-plus"> Agregar al carrito</i>'+
        '</button>'+
        '</div>'+
        '</div>'+
        '<div class="card">'+
        '<div class="w-50 p-3"><!-- Imagen -->'+
        '<img class="card-img-top" src="img_productos/vino_anejo.jpg" alt="Card image cap">'+
        '</div>'+
        '<div class="card-body"><!-- Cuerpo -->'+
        '<h5 class="card-title">VINO 3</h5>'+
        '<p class="card-text">Aqui va la info del producto.</p>'+
        '<button type="button" class="btn btn-primary">'+
        '<i class="fas fa-cart-plus"> Agregar al carrito</i>'+
        '</button>'+
        '</div>'+
        '</div>'+
        '<div class="card">'+
        '<div class="w-50 p-3"><!-- Imagen -->'+
        '<img class="card-img-top" src="img_productos/vino_anejo.jpg" alt="Card image cap">'+
        '</div>'+
        '<div class="card-body"><!-- Cuerpo -->'+
        '<h5 class="card-title">VINO 3</h5>'+
        '<p class="card-text">Aqui va la info del producto.</p>'+
        '<button type="button" class="btn btn-primary">'+
        '<i class="fas fa-cart-plus"> Agregar al carrito</i>'+
        '</button>'+
        '</div>'+
        '</div>'+
        '</div>';

}

init();

