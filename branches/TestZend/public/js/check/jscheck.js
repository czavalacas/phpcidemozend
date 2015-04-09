function getSeleccionados(){
      var nid = [];
      var nidNoSelect = [];
	  var descSeleccionados = [];	 
	//  $.each($("input[name='rutas']:checked"), function(){   // trae los que estan checkd 
	  
	  $.each($("input[name='rutas']"), function(){// para chapar los checes y los que no		  
      if(this.checked){
    	  nid.push($(this).val()); //Se guarda los nid en un array 
    	  descSeleccionados.push($(this).attr("id")); // Se guarda el Atributo Id (descripcion) para mostrarlo en la ventana
      }else{    	 
    	  nidNoSelect.push($(this).val()); //Se guarda los nid en un array     	  
      }
	  
	  });
	  
	  //convierto mi array en un string para enviarlo por url
	  if (nid.length > 0) {
		  $StringArray= nid.join("_");	
		  $.ajax(
				  {    
			 	'url' : 'index.php/cf_checkboxes/c_checkboxes/updatearRuta/'+$StringArray+'/'+'1',
		        'async' : false,
		       success: function(data) {	
		    	   
		  }    })
		  
		  
		}else{
			 alert("No ah seleccionado Ninguna opcion"); //muestra los selecionados
		}
		
	  if (nidNoSelect.length > 0) {
		  $StringArray2= nidNoSelect.join("_");	
		  $.ajax(
				  {    
			 	'url' : 'index.php/cf_checkboxes/c_checkboxes/updatearRuta/'+$StringArray2+'/'+'0',
		        'async' : false,
		       success: function(data) {	        
			  }    
		  
	})	
		}else{
			 alert("Felicidades Ah Completado La ruta"); //muestra los selecionados
		}
	  
	  if(nidNoSelect.length > 0 && nid.length > 0){
		  alert("Rutas Actualizadas : " + descSeleccionados.join(" / ")); //muestra los selecionados
	  }
	  	  }

function customCheckbox(checkboxName){
    var checkBox = $('input[name="'+ checkboxName +'"]');
    $(checkBox).each(function(){
        $(this).wrap( "<span class='custom-checkbox'></span>" );
        if($(this).is(':checked')){
            $(this).parent().addClass("selected");
        }
    });
    $(checkBox).click(function(){
        $(this).parent().toggleClass("selected");
    });
}


function realizaProceso(valorCaja1, valorCaja2){
	//Primero definir los valores a enviar
	$valorCaja1=valorCaja1;
	$valorCaja2=valorCaja2;
    $.ajax({
    	
          //  data:  parametros,
            url:   'index.php/cf_checkboxes/c_checkboxes/sumas/'+$valorCaja1+'/'+$valorCaja2, //direcion y parametros del metodo que se ejecutara
            type:  'post',
            beforeSend: function () {
                    $("#resultado").html("Procesando, espere por favor...");
            },
            success:  function (response) {
                    $("#resultado").html(response);
                    $('#alert_placeholder').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>Se Realizo la Operacion.</span></div>')
                    setTimeout(function() {
                        $("div.alert").remove();
                    }, 3000);
            }
    });
   
		   
}

function getPopupNuevaRuta(){	
	var result = $.ajax({	     
	            url:   'index.php/cf_checkboxes/c_checkboxes/getPopup/', //direcion y parametros del metodo que se ejecutara	     
	            'async' : false
	            
	}).responseText;		        
	            	document.getElementById("contenido").innerHTML = result; 	            
	            	  $('#myModal').modal('toggle');   
	            	  
	            
	            	  
	            	  
}

function agregarRuta(){
	if($('#inputRuta').val()==''){
		 alert("Ingrese un Nombre Valido");		 
	
	}else{
		$data=$('#inputRuta').val();
		 $.ajax({
	          //  data:  parametros,
	         
			    url:   'index.php/cf_checkboxes/c_checkboxes/agregarNuevaRuta/'+$data, //direcion y parametros del metodo que se ejecutara
			    type: "POST",
	            beforeSend: function () {
	            	
	              //      $("#resultado").html("Procesando, espere por favor...");
	            },
	            success:  function (response) {
	                   $("#conte").html(response);
	            }
	    });
		
		
		
		
		 $("#myModal").hide();//esconde popup
	}

}
