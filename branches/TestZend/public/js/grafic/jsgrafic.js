function drawGrafic(){
	
	jQuery('#myfirstchart').html('');

	 $.ajax({    
		 	'url' : 'index.php/cf_graficos/c_graficos/dataJSONusuaEst',
	        'async' : false,
	         dataType:"json",
		    success: function(data) {
		    	alert(data);
		    	Morris.Donut({
		  		  element: 'myfirstchart',
		  		  data:data
		  		});
		    }    
		  });
}
