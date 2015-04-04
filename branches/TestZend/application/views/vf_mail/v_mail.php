<div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      Tutorial de Envio de Correos Con CodeIgniter
      <br>
      <form>
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
	    <!--button id="btnEnviar" name="btnEnviar" class="btn btn-success" 
	            onclick="enviarCorreo($('#txtFrom').val(),$('#txtPwd').val(),$('#txtDestino').val(),$('#txtAsunto').val(),$('#txtBody').val())">Enviar Correo</button-->
	    <input id="btnEnviar" type="submit" value="Enviar Correo" onclick="enviarCorreo($('#txtFrom').val(),$('#txtPwd').val(),$('#txtDestino').val(),$('#txtAsunto').val(),$('#txtBody').val())"
	    	   class="btn btn-success"/>
	    <div id="contenido"></div>
	  </form>
</div>