
function dibujarTabla(tablaHTML,valor){
	$.when($.getScript("https://www.google.com/jsapi" ),
		   $.Deferred(function( deferred ){
		        $( deferred.resolve );
		    })
		  ).done(
	function(){
	  var jsonData = $.ajax({
	      type: "POST",
	      url: "index.php/welcome/getDataFiltradaJSONCtrl",
	      data: {myPostData : "{\"descSede\":\"" + valor + "\"}" },
	      dataType:"json",
	      async: false
	      }).responseText;
	  //alert(jsonData);
	  // Create our data table out of JSON data loaded from server.
	  var data = new google.visualization.DataTable(jsonData);	        
	  //var table = new google.visualization.Table(document.getElementById('table_div'));
	  var table = new google.visualization.Table(tablaHTML);
	  table.draw(data, {showRowNumber: true});
	});
}