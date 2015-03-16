function abrirModal(dni){
	var result = $.ajax({
        'url' : 'index.php/cf_tabla_modal/c_tabla_modal/traeDataRow/'+dni,
        'async' : false
    }).responseText;	
	
	 document.getElementById("contenido").innerHTML = result; 

    $('#myModal').modal('toggle');
}
