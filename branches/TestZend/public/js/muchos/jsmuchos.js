function abrirModal(nid){
	var result = $.ajax({
        'url' : 'index.php/cf_muchosamuchos/c_muchosamuchos/traeDataRow/'+nid,
        'async' : false
    }).responseText;	
	
	if(result == ''){
		var opc = 1;
		result = 'NO TIENE PERMISOS ESTE USUARIO <br> DESEAS AGREGARLE UN PERMISO?<br> <button class="btn btn-primary btn-md" onclick="abrirModaladd(';
		result +=nid;
		result +=')">Agregar</button>';
	}
	
	 document.getElementById("contenido").innerHTML = result; 

    $('#myModal').modal('toggle');
}

function abrirModaladd(nid){
		$('#myModal').modal('hide');
		$('#modalAdd').modal('toggle');
}
