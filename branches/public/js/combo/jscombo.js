function drawAulasTabla(cbSede,tablaHTML){
	$.when($.getScript("https://www.google.com/jsapi" ),
			   $.Deferred(function( deferred ){
			        $( deferred.resolve );
			    })
			  ).done(function(){
	  var jsonData = $.ajax({
	      type: "POST",
	      url: "index.php/welcome/getAulasFiltradaJSONCtrl",
	      data: {myPostData : "{\"nidSede\":\"" + cbSede + "\"}" },
	      dataType:"json",
	      async: false
	      }).responseText;//alert(jsonData);
	  // Create our data table out of JSON data loaded from server.
	  var data = new google.visualization.DataTable(jsonData);	        
	  var table = new google.visualization.Table(tablaHTML);
	  table.draw(data, {showRowNumber: true});
   });
}


function loadDropdown(field_dropdown, selected_value){
    var result = $.ajax({
        'url' : 'index.php/welcome/cargarAulasCombo/'+selected_value,
        'async' : false
    }).responseText;
    field_dropdown.replaceWith(result);
}