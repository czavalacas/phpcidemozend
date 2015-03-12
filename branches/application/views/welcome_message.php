<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>CI ZEND</title>
	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type = "text/javascript" src = "https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['corechart','table','piechart','linechart','controls','charteditor']}]}" ></script>
    
	<script>
		function showHint(str) {
		    if (str.length == 0) { 
		        document.getElementById("txtHint").innerHTML = "";
		        return;
		    } else {
		        var xmlhttp = new XMLHttpRequest();
		        xmlhttp.onreadystatechange = function() {
		            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
		            }
		        }
		        xmlhttp.open("GET", "index.php/welcome/ajaxReq?q=" + str, true);
		        xmlhttp.send();
		    }
		}

	    function drawChart(){
	      var jsonData = $.ajax({
	          url: "index.php/welcome/getDataJSONCtrl",
	          dataType:"json",
	          async: false
	          }).responseText;
	      //alert(jsonData);
	      // Create our data table out of JSON data loaded from server.
	      var data = new google.visualization.DataTable(jsonData);	        
	      var table = new google.visualization.Table(document.getElementById('table_div'));
     	  table.draw(data, {showRowNumber: true});
	    }

	    function drawTabla(){
	      var jsonData = $.ajax({
		      type: "POST",
	          url: "index.php/welcome/getDataFiltradaJSONCtrl",
	          data: {myPostData : "{\"descSede\":\"" + $('#nombre').val() + "\"}" },
	          dataType:"json",
	          async: false
	          }).responseText;
	      //alert(jsonData);
	      // Create our data table out of JSON data loaded from server.
	      var data = new google.visualization.DataTable(jsonData);	        
	      var table = new google.visualization.Table(document.getElementById('table_div'));
     	  table.draw(data, {showRowNumber: true});
		}

	    function drawAulasTabla(cbSede){
	      var jsonData = $.ajax({
		      type: "POST",
	          url: "index.php/welcome/getAulasFiltradaJSONCtrl",
	          data: {myPostData : "{\"nidSede\":\"" + cbSede + "\"}" },
	          dataType:"json",
	          async: false
	          }).responseText;//alert(jsonData);
	      //alert(jsonData);
	      // Create our data table out of JSON data loaded from server.
	      var data = new google.visualization.DataTable(jsonData);	        
	      var table = new google.visualization.Table(document.getElementById('table_div'));
     	  table.draw(data, {showRowNumber: true});
		}

	    function loadDropdown(field_dropdown, selected_value){
	        var result = $.ajax({
	            'url' : 'index.php/welcome/cargarAulasCombo/'+selected_value,
	            'async' : false
	        }).responseText;//alert(result);
	        field_dropdown.replaceWith(result);
        }

	    $(document).ready(function(){
		    //drawTabla();
	        $('#field1').change(function() {
		        /*var val = $("#field1 option:selected").val();
		        if(val == 1){
		        	$( "#field2" ).prop("disabled", true );
		        }*/
	           //alert($("#field1 option:selected").val());
	           //$( "#field2" ).prop("disabled", true );
	      });  
	    });
	</script>
</head>
<body>
<div id="container">
	<h1>Welcome to CI ZEND! <?php echo isset($nombre) ? $nombre : null; ?></h1>
    <form action="buscar" method = "POST">
       <input name="nombre" id="nombre" type="text" value = "<?php echo isset($nombre2) ? $nombre2 : null; ?>"/>
       <input type="submit" value="VER" name="btncreate" id="btncreate" />
    </form>
    <input type="submit" value="VER AJAX" name="btnAjax" id="btnAjax" onclick="drawTabla();"/>
    <form> 
		First name: <input type="text" onkeyup="showHint(this.value)">
	</form>
	<p>Suggestions: <span id="txtHint"></span></p>
    <?php 
	    $this->load->helper('url');
	    echo base_url();
	    echo form_open('insert');// 
	    $js = 'id="field1" onChange = "drawAulasTabla(this.value); loadDropdown($(\'#field2\'),this.value); " '; 
	    echo form_dropdown('field1', $sedes, NULL, $js);
	    echo form_dropdown('field2', array('0' => '...'), NULL, 'id="field2"');
	    echo form_close();
	?>
    <div id="table_div"></div>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>
<!-- (isset($nombre2) ? $nombre2 : null) -->
</body>
</html>