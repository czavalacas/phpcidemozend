function abrirModal(tipo,nid){
	
	if(tipo == 'edit'){
		var result = $.ajax({
	        'url' : 'index.php/cf_transacciones/c_transacciones/traeInfoRuta1/'+nid,
	        'async' : false
	    }).responseText;	
		
		var btnElim =  '<button class="btn btn-warning btn-md" onclick="editar(';
		btnElim+=nid;
		btnElim+=')">Editar</button>'
		
		
		 document.getElementById("contenidoEditar").innerHTML = result; 
		 document.getElementById("btnEditar").innerHTML = btnElim; 
		
		$('#modalEdit').modal('toggle');
		
	}else if(tipo == 'elim'){
		var result = $.ajax({
	        'url' : 'index.php/cf_transacciones/c_transacciones/traeInfoRuta/'+nid,
	        'async' : false
	    }).responseText;	
		
		var btnElim =  '<button class="btn btn-warning btn-md" onclick="eliminar(';
		btnElim+=nid;
		btnElim+=')">Eliminar</button>'
		
		
		 document.getElementById("contenidoEliminar").innerHTML = result; 
		 document.getElementById("btnEliminar").innerHTML = btnElim; 
		
		$('#modalElim').modal('toggle');
		
	}else{
		

		$('#modalInsert').modal('toggle');
	}
    
}


function insertar(){
	var descripcion = $("input[name=descripcion]").val();
	var checkBox = $('#estado:checked').val();
	var estado = '';

	
	if(descripcion != ''){
		
		if(checkBox != undefined){
			estado = '1';
		}else{
			estado = '0';
		}
		
		var myPostData = {};
	    myPostData.descrip = descripcion;
		myPostData.estado = estado;
		
		var jsonString = JSON.stringify(myPostData);
		
		$.ajax({    
			 type: "POST",
		 	'url' : 'index.php/cf_transacciones/c_transacciones/insertarRuta',
		 	 data: {myPostData : jsonString },
	        'async' : false   
		  });
		
		$('#modalInsert').modal('hide');
		
		document.getElementById('page-wrapper').innerHTML="";
		window.location.href='javascript:invocarPantalla("trans");';
		
	}
}

function eliminar(nid){
	$.ajax({
        'url' : 'index.php/cf_transacciones/c_transacciones/eliminarRuta/'+nid,
        'async' : false
    });	
	
	$('#modalElim').modal('hide');
	
	document.getElementById('page-wrapper').innerHTML="";
	window.location.href='javascript:invocarPantalla("trans");';
}

function editar(nid){
	var descripcion = $("input[name=descripcionEdit]").val();
	var checkBox = $('#estadoEdit:checked').val();
	var estado = '';
	
	if(descripcion != ''){
		
		if(checkBox != undefined){
			estado = '1';
		}else{
			estado = '0';
		}
		
		var myPostData = {};
	    myPostData.descrip = descripcion;
		myPostData.estado = estado;
		myPostData.nid = nid;
		
		var jsonString = JSON.stringify(myPostData);
		
		$.ajax({    
			 type: "POST",
		 	'url' : 'index.php/cf_transacciones/c_transacciones/editarRuta',
		 	 data: {myPostData : jsonString },
	        'async' : false   
		  });
		
		$('#modalEdit').modal('hide');
		
		document.getElementById('page-wrapper').innerHTML="";
		window.location.href='javascript:invocarPantalla("trans");';
		
	}

}


