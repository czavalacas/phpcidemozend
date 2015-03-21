function drawGrafic(){
	
	jQuery('#myfirstchart').html('');

	 $.ajax({    
		 	'url' : 'index.php/cf_graficos/c_graficos/dataJSONusuaEst',
	        'async' : false,
	         dataType:"json",
		    success: function(data) {
		    	Morris.Donut({
		  		  element: 'myfirstchart',
		  		  data:data
		  		});
		    }    
		  });
}

function drawGrafic1(){
	
	
	jQuery('#chartContainer').html('');

	 $.ajax({    
		 	'url' : 'index.php/cf_graficos/c_graficos/dataJSONusuaEst1',
	        'async' : false,
	         dataType:"json",
		    success: function(data) {
		    	
		    	var chart = new CanvasJS.Chart("chartContainer",
		    		    {
		    		      title:{
		    		        text: "Grafico"
		    		      },
		    		       data: [
		    		      {
		    		    	  
		    		    	  click: function(e){
		    		    		  
		    		    		  var est = e.dataPoint.x;
		    		    		  
		    		    		  var result = $.ajax({
		    		    		        'url' : 'index.php/cf_graficos/c_graficos/usuarioByEstado/'+est,
		    		    		        'async' : false
		    		    		    }).responseText;	
		    		    		 
		    		    		    document.getElementById("contenido").innerHTML = result; 
		    		    		    $('#myModal').modal('toggle');
		    		    		  
		    		    	        },
		    		    	  
		    		         type: "pie",
		    		       showInLegend: true,
		    		       dataPoints: data
		    		     }
		    		     ]
		    		   });

		    		    chart.render();
		    }    
		  });
	
	
	
	
}

