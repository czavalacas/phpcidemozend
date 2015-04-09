  </br></br>
  <div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
   
      </div>

<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#Nombres" role="tab" data-toggle="tab">Nombres</a></li>
  <li><a href="#Apellidos" role="tab" data-toggle="tab">Apellidos</a></li>
  <li><a href="#Edad" role="tab" data-toggle="tab">Edad</a></li>
  <li><a href="#Resultado" role="tab" data-toggle="tab">Resultado</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">

  <div class="tab-pane active" id="Nombres">
  </br>
  Nombre
  <input type="text" name="nombre" id="valor1" value=""/>  
  </div>
  
  <div class="tab-pane" id="Apellidos">
  </br>
  Apellido
  <input type="text" name="apellido" id="valor2" value=""/>  
  </div>
  
  <div class="tab-pane" id="Edad">
  </br>
  Edad
  <input type="text" name="edad" id="valor3" value=""/>
  </div>  
  
  <div class="tab-pane" id="Resultado">  
  </br> 
  <input id="btnResult" type="submit" value="Calcula"   onclick="getDataCompleta()" />   
  </br>
  <span id="resultado"></span>
  <div id = "alert_placeholder"></div>
  </div>
  
</div>

</br></br></br>