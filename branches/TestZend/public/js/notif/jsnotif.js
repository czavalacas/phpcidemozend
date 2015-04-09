
function notificacion(){
	
    $.ajax({
        'url' : 'index.php/cf_notificacion/c_notificacion/getNotificacion',
        'async' : false,
        dataType:"json",
        success: function(data) {
        	$('#contenido').html(data[0].contenido);
	    } 
    });
    
    $.ajax({
        'url' : 'index.php/cf_notificacion/c_notificacion/getCountNotificacionSinver',
        'async' : false,
        success: function(data) {
        	if(data >= 1){
        		$('#cantidadNotif').html(data);
        	}else{
        		$('#cantidadNotif').html('');
        	}
        	
	    } 
    });
    
    $.ajax({
        'url' : 'index.php/cf_notificacion/c_notificacion/getNotificaciones',
        'async' : false,
        success: function(data) {
        	$('#mensajes').html(data);
	    } 
    });
	
	
	setTimeout(this.notificacion, 100);
}

function enviarNotif(){
	var descripcion = $("input[name=textContenido]").val();
	if(descripcion){
		var result = $.ajax({
	        'url' : 'index.php/cf_notificacion/c_notificacion/enviarNotif/'+descripcion,
	        'async' : false
	    }).responseText;
		
		document.getElementById('textContenido').value='';
	}
	
	
}

function verNotificaciones(){
	$.ajax({
        'url' : 'index.php/cf_notificacion/c_notificacion/updateVisto',
        'async' : false,
        success: function(data) {
        	$('#cantidadNotif').html('');
	    } 
    });
}

