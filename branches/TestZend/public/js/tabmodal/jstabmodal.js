function abrirModal(nid){
	var result = $.ajax({
        'url' : 'index.php/cf_tabla_modal/c_tabla_modal/traeDataRow/'+nid,
        'async' : false
    }).responseText;	
	
	 document.getElementById("contenido").innerHTML = result; 

    $('#myModal').modal('toggle');
}

function entrada(){
	$('#example').dataTable( {
        "pagingType": "full_numbers"
    } );
}