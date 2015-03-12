function autocompletar(inputJQ,ulObj){
	var key = event.keyCode || event.charCode;
    if(key == 8 || key == 46){
    	ulObj.html('');
    }
	var query_string = inputJQ.val();
	if(query_string.length < 2){
		return;
	}
	$.ajax({
		type: "POST",
		url: "index.php/cf_autocompletar/c_autocompletar/buscarProfes",
		data: { name:query_string },
		success: function(data){
			ulObj.html(data);
			ulObj.find('li').click(function(){
				var nombreProf = $(this).text();
				var dniProf = $(this).attr('dniProf');
				//alert('dniProf: '+dniProf+' , nombreProf: '+nombreProf);
				inputJQ.attr('value', nombreProf); 
				inputJQ.val(nombreProf);
				ulObj.html('');
			});//Fin del click
		}
	});//fin del ajax
}