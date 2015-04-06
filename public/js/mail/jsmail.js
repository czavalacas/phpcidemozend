function enviarCorreo(txtFrom,txtPwd,txtDestino,txtAsunto,txtBody,formJQ,contJQ){
	formJQ.on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "index.php/cf_mail/c_mail/do_upload",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
				contJQ.html(contJQ.html());//resetea el form
				var jsonData = $.ajax({
				       type: "POST",
				       url: "index.php/cf_mail/c_mail/enviarCorreo",
				       data: {myPostData : "{\"correoEnvia\":\"" + txtFrom + "\", " +
				       		                "\"claveCorreo\":\"" + txtPwd + "\", "+
				       		                "\"destino\":\"" + txtDestino + "\", "+
				       		                "\"asunto\":\"" + txtAsunto + "\", "+
				       		                "\"body\":\"" + txtBody + "\", "+
				       		                "\"adjuntoRuta\":\"" + data + "\" "+
				       						"}" },
				       dataType:"json",
				       async: false
				  }).responseText;
				  document.getElementById("contenido").innerHTML = jsonData;
		    },error: function() {
	    	} 	        
	   });
	}));
   //
}