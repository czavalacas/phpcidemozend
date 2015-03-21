function subirArchivo(formJQ,imgJQ,divJQ,contJQ){
	formJQ.on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "index.php/cf_upload/c_upload/do_upload",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data){
				contJQ.html(contJQ.html());//resetea el form
				divJQ.html(data);//Dentro del div carga la imagen/pdf
		    },error: function() {
	    	} 	        
	   });
	}));
}
