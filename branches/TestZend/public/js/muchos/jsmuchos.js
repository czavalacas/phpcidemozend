function abrirModal(nid){
	var result = $.ajax({
        'url' : 'index.php/cf_muchosamuchos/c_muchosamuchos/traeDataRow/'+nid,
        'async' : false
    }).responseText;	
	
	if(result == ''){
		var opc = 1;
		result = 'NO TIENE PERMISOS ESTE USUARIO <br> DESEAS AGREGARLE UN PERMISO?<br> <button class="btn btn-primary btn-md" onclick="abrirModaladd(';
		result +=nid;
		result +=')">EDITAR PERMIOS</button>';
	}
	
	else{
		result += '<br/> <button class="btn btn-primary btn-md" onclick="abrirModaladd(';
		result +=nid;
		result +=')">EDITAR PERMIOS</button>';
	}
	
	 document.getElementById("contenido").innerHTML = result; 

    $('#myModal').modal('toggle');
}

function abrirModaladd(nid){
		var result = $.ajax({
	        'url' : 'index.php/cf_muchosamuchos/c_muchosamuchos/getlistaPermisos/'+nid,
	        'async' : false
	    }).responseText;
		
		document.getElementById("contenidoIngresar").innerHTML = result;
		
		$('#myModal').modal('hide');
		$('#modalAdd').modal('toggle');	
}

function agregarPermiso(nidPermiso,nidUsuario,tipo){
	
	var myPostData = {};
    myPostData.nidPermiso = nidPermiso;
	myPostData.nidUsuario = nidUsuario;
	myPostData.tipo = tipo;
	
	var jsonString = JSON.stringify(myPostData);
	
	if(tipo == 0){
		$.ajax({    
			 type: "POST",
		 	'url' : 'index.php/cf_muchosamuchos/c_muchosamuchos/transPermisosUsuario',
		 	 data: {myPostData : jsonString },
	        'async' : false   
		  });
		
		document.getElementById(nidPermiso).setAttribute('onclick','agregarPermiso('+nidPermiso+','+nidUsuario+','+1+')');
		document.getElementById(nidPermiso).className = "btn btn-danger";
	}else{
		$.ajax({    
			 type: "POST",
		 	'url' : 'index.php/cf_muchosamuchos/c_muchosamuchos/transPermisosUsuario',
		 	 data: {myPostData : jsonString },
	        'async' : false   
		  });
		
		document.getElementById(nidPermiso).setAttribute('onclick','agregarPermiso('+nidPermiso+','+nidUsuario+','+0+')');
		document.getElementById(nidPermiso).className = "btn btn-success";
	}
}
