   <div id="content">
      <h1>Titulo:: <?php echo $titulo?></h1>     
      <br>
 <div id="conte">
            
<?php 
echo $js;
foreach($checkbox as $chk){
	echo $chk;
}
?>

</div>
 <br>
  <input id="btnActu" type="submit" value="Guardar Rutas Seleccionados"   onclick="getSeleccionados();" /> 
    <input id="openPopup" type="submit" value="Nueva Ruta"   onclick="getPopupNuevaRuta();" /> 
 <br/>
  
  <br>
 Introduce valor 1
 <input type="text" name="caja_texto" id="valor1" value="0"/>

  <br>
  Introduce valor 2
 <input type="text" name="caja_texto" id="valor2" value="0"/>
  Realiza suma

    <br>
  <input id="btnSumar" type="submit" value="Calcula"   onclick="realizaProceso($('#valor1').val(),$('#valor2').val());" /> 
  <br/>

  Resultado: <span id="resultado">0</span>

  </div>
  
   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
      <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar Nueva Ruta</h4>
              </div>
              <div class="modal-body">
              <div id="contenido"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal" >Cerrar</button>
              </div>
            </div>
      </div>   


