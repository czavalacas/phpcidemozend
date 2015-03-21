   <div id="content">
      <h1>Titulo:: <?php echo $titulo?></h1>     
      <br>

<?php 
echo $js;
foreach($checkbox as $chk){
	echo $chk;
}
?>
 <br>
  <input type="submit" value="Actualiza Ruta BD"   onclick="getSeleccionados();" />   
    </div>



