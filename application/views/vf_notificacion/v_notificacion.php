   <div id="content">
      <h1>Titulo:: <?php echo $titulo;?></h1>
      
      <div>
      Ultimo Mensaje: 
      <br/>
      <div id="contenido"></div>
      </div>
      <br/>
      <div id="formulario">
      ENVIAR MENSAJE
      <br/>
        <form class="form-inline">
                <div class="form-group">
                      <div class="input-group">
                          <div class="input-group-addon">Contenido</div>
                      <input type="text" class="form-control" id="textContenido" name="textContenido" value="">
                  </div> 
                  
                </div>
              </div>
              <button class="btn btn-primary btn-md"onclick="enviarNotif()">Enviar</button>
         </form>
      </div>
   </div>
   
   <br>
   DENLE CLICK AL ICONO DEL SOBRE PARA VER LOS ULTIMOS 5 MENSAJES 
   <br>
   
   <ul class="nav top-nav">
   <li class="dropdown" onclick="verNotificaciones()">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <span id="cantidadNotif" class="badge"></span> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                    
                        <div id="mensajes"></div>
                        
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                </ul>