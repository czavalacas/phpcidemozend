   <div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      TUTORIAL DE TABLAS AJAX
      <br>
      <input name="nombre" id="nombre" type="text" 
             onkeyup="dibujarTabla($('#table_div')[0],$('#nombre').val() );"/>
      <a >saluda</a>
      <div id="table_div">
      
      </div>
   </div>