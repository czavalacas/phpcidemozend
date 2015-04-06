<div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      Tutorial de Envio de Correos Con CodeIgniter
      <br>
	    <div class="form-group">
	      <input type="text" class="form-control" id="txtFrom" placeholder="Correo Gmail">
	    </div>
	    <div class="form-group">
	      <input type="password" class="form-control" id="txtPwd" placeholder="Clave">
	    </div>
	    <div class="form-group">
	      <input type="text" class="form-control" id="txtDestino" placeholder="Correo destino de Gmail">
	    </div>
	    <div class="form-group">
	      <input type="text" class="form-control" id="txtAsunto" placeholder="Asunto">
	    </div>
	    <div class="form-group">
	      <textarea class="form-control" rows="6" id="txtBody" placeholder="Contenido"></textarea>
	    </div>
	    <div id="cont">
	    <?php echo form_open_multipart('subir','id="myForm"');?>
			 <input id="itFile" type="file" name="userfile" size="20" /><br>
			 <input id="btnEnviar" type="submit" value="Enviar Correo" 
onclick="enviarCorreo($('#txtFrom').val(),$('#txtPwd').val(),$('#txtDestino').val(),$('#txtAsunto').val(),$('#txtBody').val(),$('#myForm'),$('#cont'))"
	    	   class="btn btn-success"/>
		 </form>
		</div>
		<br>
	    <div id="contenido"></div>
</div>