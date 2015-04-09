function getDataCompleta(){
	$cont=0;
	$StringConcatenado='';
	if($('#valor1').val()==''){
		$StringConcatenado+=$('#valor1').attr("name")+" "; //trae un atributo de un componente 	$('#id').attr("name"); 
		$cont++;
	}
	if($('#valor2').val()==''){
		$StringConcatenado+=$('#valor2').attr("name")+" ";	 
		$cont++;
	
	}
	if($('#valor3').val()==''){
		$StringConcatenado+=$('#valor3').attr("name")+" ";  
		$cont++;
	}
	
	if($cont>0){
		alert("Porfavor llene los campos: "+$StringConcatenado);		
	}	
	
	else{
		
		
		$data1=$('#valor1').val();
		$data2=$('#valor2').val();
		$data3=$('#valor3').val();
		 $.ajax({
	          //  data:  parametros,
	         
			    url:   'index.php/cf_tabPanel/c_tabPanel/concatenarValoresTabPanel/'+$data1+'/'+$data2+'/'+$data3, //direcion y parametros del metodo que se ejecutara
			    type: "POST",
	            success:  function (response) {
	                   $("#resultado").html(response);
	                   
	                   $('#alert_placeholder').html('<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>Se Realizo la Operacion.</span></div>')
	                    setTimeout(function() {
	                        $("div.alert").remove();
	                    }, 3000);
	                   
	            }
	    });
		
		
	}
	
}