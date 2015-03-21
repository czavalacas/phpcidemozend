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